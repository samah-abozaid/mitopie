<?php
namespace models;

class Product
{
    public int    $id;
    public string $nom;
    public string $description;
    public float  $prix;
    public string $unite;
    public int    $categorie_id;
    public string $image;
    public string $saison;
    public string $disponibilite;  // 'disponible' | 'sur_commande' | 'indisponible'
    public bool   $visible;
    public string $created_at;
    public string $updated_at;

    public static function fromArray(array $row): self
    {
        $p               = new self();
        $p->id           = (int)  $row['id'];
        $p->nom          =        $row['nom'];
        $p->description  =        $row['description'] ?? '';
        $p->prix         = (float) $row['prix'];
        $p->unite        =        $row['unite']        ?? 'pièce';
        $p->categorie_id = (int)  $row['categorie_id'];
        $p->image        =        $row['image']        ?? 'default.jpg';
        $p->saison       =        $row['saison']       ?? 'Toute saison';
        $p->disponibilite =       $row['disponibilite'] ?? 'disponible';
        $p->visible      = (bool) $row['visible'];
        $p->created_at   =        $row['created_at']   ?? '';
        $p->updated_at   =        $row['updated_at']   ?? '';
        return $p;
    }
}
