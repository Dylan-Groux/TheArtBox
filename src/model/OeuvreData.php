<?php

namespace App\Model;

class OeuvreData {
    private ?int $id = null;
    private string $titre;
    private string $artiste;
    private string $image;
    private string $description;

    public function __construct(int $id, string $titre, string $artiste, string $image, string $description) {
        $this->id = $id;
        $this->titre = $titre;
        $this->artiste = $artiste;
        $this->image = $image;
        $this->description = $description;
    }

    public static function fromArray(array $data): self {
        return new self(
            $data['id'] ?? 0,
            $data['titre'] ?? '',
            $data['artiste'] ?? '',
            $data['image_path'] ?? '',
            $data['description'] ?? ''
        );
    }

    public function getId(): ?int { return $this->id ?? null; }
    public function getDescription(): string { return $this->description; }
    public function getTitre(): string { return $this->titre; }
    public function getArtiste(): string { return $this->artiste; }
    public function getImage(): string { return $this->image; }
}


