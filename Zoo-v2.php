<?php

// Abstrakcyjna klasa Zwierze
abstract class Zwierze {
    protected $imie;
    protected $gatunek;

    public function __construct($imie) {
        $this->imie = $imie;
    }

    public function __toString() {
        return $this->gatunek . ' ' . $this->imie;
    }

    abstract public function jedz();
}

// Klasy konkretnych gatunków zwierząt
class Pies extends Zwierze {
    protected $gatunek = 'Pies';

    public function jedz() {
        return 'Jem mięso';
    }

    public function cosFutro() {
        return 'Potrzebuję czesania!';
    }
}

class Tygrys extends Zwierze {
    protected $gatunek = 'Tygrys';

    public function jedz() {
        return 'Jem mięso';
    }

    public function cosFutro() {
        return 'Potrzebuję czesania!';
    }
}

class Slon extends Zwierze {
    protected $gatunek = 'Słoń';

    public function jedz() {
        return 'Jem rośliny';
    }
}

class Nosorozec extends Zwierze {
    protected $gatunek = 'Nosorożec';

    public function jedz() {
        return 'Jem rośliny';
    }
}

class Lis extends Zwierze {
    protected $gatunek = 'Lis';

    public function jedz() {
        return 'Jem mięso';
    }

    public function cosFutro() {
        return 'Potrzebuję czesania!';
    }
}

class Irbis extends Zwierze {
    protected $gatunek = 'Irbis śnieżny';

    public function jedz() {
        return 'Jem mięso i rośliny';
    }

    public function cosFutro() {
        return 'Potrzebuję czesania!';
    }
}

class Krolik extends Zwierze {
    protected $gatunek = 'Królik';

    public function jedz() {
        return 'Jem rośliny';
    }
}

// Przykładowe użycie
$dog = new Pies('Duke');
echo $dog . "\n"; // Pies Duke
echo $dog->jedz() . "\n"; // Jem mięso
echo $dog->cosFutro() . "\n"; // Potrzebuję czesania!

$tiger = new Tygrys('Richard');
echo $tiger . "\n"; // Tygrys Richard
echo $tiger->jedz() . "\n"; // Jem mięso
echo $tiger->cosFutro() . "\n"; // Potrzebuję czesania!

$elephant = new Slon('Dumbo');
echo $elephant . "\n"; // Słoń Dumbo
echo $elephant->jedz() . "\n"; // Jem rośliny

$rabbit = new Krolik('Bunny');
echo $rabbit . "\n"; // Królik Bunny
echo $rabbit->jedz() . "\n"; // Jem rośliny
