<?php

namespace App\DesignPatterns\Creational\AbstractFactory\Interfaces;

Interface GuiFactoryInterface
{
	public function buildButton(): ButtonInterface;

	public function buildCheckBox(): CheckBoxInterface;
}
