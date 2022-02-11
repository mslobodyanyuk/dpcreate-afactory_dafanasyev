<?php

namespace App\DesignPatterns\Creational\AbstractFactory\Factories;

use App\DesignPatterns\Creational\AbstractFactory\Classes\SemanticUi\ButtonSemanticUi;
use App\DesignPatterns\Creational\AbstractFactory\Classes\SemanticUi\CheckBoxSemanticUi;

use App\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckBoxInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class SemanticUiFactory implements GuiFactoryInterface
{
	public function buildButton(): ButtonInterface
	{
		return new ButtonSemanticUi();
	}

	public function buildCheckBox(): CheckBoxInterface
	{
		return new CheckBoxSemanticUi();
	}

}
