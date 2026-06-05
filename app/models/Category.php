<?php
namespace models;

class Category
{
    public int    $id;
    public string $nom;
    public string $icone;
    public string $description;
    public int    $ordre;
    public string $created_at;

    public static function fromArray(array $row): self
    {
        $c              = new self();
        $c->id          = (int) $row['id'];
        $c->nom         =       $row['nom'];
        $c->icone       =       $row['icone']       ?? '🌿';
        $c->description =       $row['description'] ?? '';
        $c->ordre       = (int) $row['ordre'];
        $c->created_at  =       $row['created_at']  ?? '';
        return $c;
    }
}
