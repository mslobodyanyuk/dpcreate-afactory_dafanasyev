<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DesignPatterns\Creational\AbstractFactory\GuiKitFactory;

class CreationalPatternsController extends Controller
{
    private $guiKit;

	public function __construct()
	{
		//$this->guiKit = (new GuiKitFactory())->getFactory('bootstrap');
		  $this->guiKit = (new GuiKitFactory())->getFactory('semanticui');
	}

	public function AbstractFactory()
	{
		$description = GuiKitFactory::getDescription();

		$result[] = $this->guiKit->buildButton()->draw();
		$result[] = $this->guiKit->buildcheckBox()->draw();

		\Debugbar::info($result);

		return view('dump', compact('description'));
	}

}
