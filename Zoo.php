<?php

interface Food 
{
	public function __construct(int $weight);
}

abstract class Meal implements Food 
{
	public function __construct(public int $weight) {}
}

class Meat extends Meal {}
class Vegetable extends Meal {}

interface Animal 
{
	public function __construct(string $name);
	public function eat(Meal $food);
}
	
abstract class Carnivorous implements Animal 
{
	public function __construct(protected string $name) {}
	
	public function eat(Meal $food)
	{
		if (!$food instanceof Meat) {
			throw new Exception('I cant eat it.');
		}
		
		return $this->name . ' ate ' . $food->weight . ' kg of '.$food::class;
	}
}

abstract class Herbivorous implements Animal 
{
	public function __construct(protected string $name) {}
	
	public function eat(Meal $food)
	{
		if (!$food instanceof Vegetable) {
			throw new Exception('I cant eat it.');
		}
		
		return $this->name . ' ate ' . $food->weight . ' kg of '.$food::class;
	}
}

abstract class Omnivorous implements Animal 
{
	public function __construct(protected string $name) {}
	
	public function eat(Meal $food)
	{
		return $this->name . ' ate ' . $food->weight . ' kg of '.$food::class;
	}
}

trait AnimalTrait
{
	public function __toString()
	{
		return self::class . ' ' . $this->name . ' ';;
	}
}

trait Fur
{
	public function brush()
	{
		return 'Brushing..';
	}
}

class Tiger extends Carnivorous { use AnimalTrait; use Fur; }
class Elephant extends Herbivorous { use AnimalTrait; }
class Rhino extends Herbivorous { use AnimalTrait; }
class Fox extends Carnivorous { use AnimalTrait; use Fur; }
class SnowLeopard extends Carnivorous { use AnimalTrait; use Fur; }
class Rabbit extends Herbivorous { use AnimalTrait; use Fur; }
class Bear extends Omnivorous { use AnimalTrait; use Fur; }

class Zoo 
{	
	private array $animals = [];
	
	public function addAnimal(Animal $animal)
	{
		$this->animals[] = $animal;
	}
	
	public function getAnimals(): array
	{
		return $this->animals;
	}
}

$zoo = new Zoo();
$zoo->addAnimal(new Tiger('Maczo'));
$zoo->addAnimal(new Elephant('Trąbacz'));
$zoo->addAnimal(new Rhino('Kozak'));
$zoo->addAnimal(new Fox('Spryciarz'));
$zoo->addAnimal(new SnowLeopard('Bałwan'));
$zoo->addAnimal(new Rabbit('Wariat'));
$zoo->addAnimal(new Bear('Sierściuch'));

foreach ($zoo->getAnimals() as $animal) {
	echo $animal. "\n";
	if ($animal instanceof Carnivorous) {
		echo $animal->eat(new Meat(1)). "\n";;
	} elseif ($animal instanceof Herbivorous) {
		echo $animal->eat(new Vegetable(1)). "\n";;
	} elseif ($animal instanceof Omnivorous) {
		echo $animal->eat(new Vegetable(1)). "\n";;
		echo $animal->eat(new Meat(1)). "\n";;
	}
	if(in_array($animal::class, ['Tiger', 'Fox', 'SnowLeopard', 'Rabbit', 'Bear'])) {
		echo $animal->brush() . "\n";
	}
}

