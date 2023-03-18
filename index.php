<?php

interface Machines
{
    public function __construct($length, $width, $height, $weight, $color, $type);
}

abstract class Machine implements Machines
{
    private int $length;
    private int $width;
    private int $height;
    private int $weight;
    private string $color;
    private string $type;

    public function __construct($length, $width, $height, $weight, $color, $type)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
        $this->color = $color;
        $this->type = $type;
    }

    /**
     * Доступно к выводу:
     * length - длина;
     * width - ширина;
     * height - высота;
     * weight - вес;
     * color - вет;
     * type - тип;
     */
    public function getParams($params)
    {
        return $this->$params;
    }

    public function getType(): string
    {
        return $this->type;
    }

    abstract protected function move(string $where): string;
}

class Transport extends Machine
{
    private $salon = 'cloth';

    public function move($where): string
    {
        return 'Move ' . $where;
    }

    public function bibeep(): string
    {
        return 'bibeep!';
    }

    public function wipers(bool $bool): string
    {
        return $bool ? 'Wipers it`s ON' : 'Wipers it`s OFF';
    }

    public function feature()
    {
        if ($this->getType() === 'car') {
            return 'nitrous oxide is activated!';
        }

        if ($this->getType() === 'bulldozer') {
            return 'bucket control activated!';
        }
    }

    public function getSalon() {
        return $this->salon;
    }

    public function setSalon($salon) {
        $this->salon = $salon;
    }
}

$car = new Transport(10, 5, 2, 2, 'red', 'car');
$car->move('left');
$car->getParams('length');
$car->bibeep();
$car->wipers(true);
$car->setSalon('skin');
$car->getSalon();
$car->feature();

$bulldozer = new Transport(10, 5, 3, 10, 'yellow', 'bulldozer');
$bulldozer->move('left');
$bulldozer->getParams('length');
$bulldozer->bibeep();
$bulldozer->wipers(false);
$bulldozer->feature();