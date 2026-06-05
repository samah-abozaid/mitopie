<?php
namespace controllers;

class AboutController
{
    public function index(): void
    {
        render('about/index', [
            'title'      => 'Notre histoire — Mitopie',
            'activePage' => 'histoire',
        ]);
    }
}
