<?php

namespace Tests\Feature;

use App\Livewire\Web\CreateFilm;
use App\Models\Film;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class FilmTest extends TestCase
{
    use RefreshDatabase;

    public function test_cadastra_filme_e_redireciona_para_visualizacao(): void
    {
        Storage::fake('public');

        $component = Livewire::test(CreateFilm::class)
            ->set('form.title', 'Matrix')
            ->set('form.summary', 'Um hacker descobre que vive numa simulação.')
            ->set('form.cover', UploadedFile::fake()->image('capa.jpg'))
            ->call('save')
            ->assertHasNoErrors();

        $film = Film::sole();
        $component->assertRedirect(route('see', $film));
        $this->assertSame('Matrix', $film->title);
        Storage::disk('public')->assertExists($film->cover);
    }

    public function test_formulario_vazio_mostra_erros_de_validacao(): void
    {
        Livewire::test(CreateFilm::class)
            ->call('save')
            ->assertHasErrors(['form.title', 'form.summary', 'form.cover'])
            ->assertSee('Informe o título do filme.');

        $this->assertSame(0, Film::count());
    }

    public function test_capa_precisa_ser_imagem(): void
    {
        Livewire::test(CreateFilm::class)
            ->set('form.cover', UploadedFile::fake()->create('documento.pdf', 10, 'application/pdf'))
            ->call('save')
            ->assertHasErrors(['form.cover' => 'image']);
    }

    public function test_visualizacao_mostra_filme_e_404_quando_nao_existe(): void
    {
        $film = Film::create(['title' => 'Matrix', 'summary' => 'Resumo do filme.', 'cover' => 'covers/x.jpg']);

        $this->get(route('see', $film))->assertOk()->assertSee('Matrix');
        $this->get('/ver/999')->assertNotFound();
    }

    public function test_listagem_pagina_de_12_em_12_mais_recentes_primeiro(): void
    {
        foreach (range(1, 13) as $i) {
            Film::create(['title' => "Filme número {$i}.", 'summary' => 'Resumo do filme.', 'cover' => 'covers/x.jpg']);
        }

        $this->get('/')->assertOk()
            ->assertSee('Filme número 13.')
            ->assertDontSee('Filme número 1.');

        $this->get('/?page=2')->assertOk()
            ->assertSee('Filme número 1.')
            ->assertDontSee('Filme número 13.');
    }
}
