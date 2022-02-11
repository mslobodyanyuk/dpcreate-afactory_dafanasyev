<?php

namespace App\DesignPatterns\Creational\AbstractFactory;

use App\DesignPatterns\Creational\AbstractFactory\Factories\BootstrapFactory;
use App\DesignPatterns\Creational\AbstractFactory\Factories\SemanticUiFactory;

use App\DesignPatterns\Creational\AbstractFactory\interfaces\GuiFactoryInterface;

class GuiKitFactory{

	public function getFactory($type): GuiFactoryInterface
	{
		switch($type){
			case 'bootstrap':
				$factory = new BootstrapFactory();
				break;
			case 'semanticui':
				$factory = new SemanticUiFactory();
				break;
			default:
				throw new \Exception("Неизвестный тип фабрики [{$type}]");
		}
		return $factory;
	}

	static public function getDescription()
	{
        $description = [
                            'name' => 'Абстрактная фабрика (Abstract factory) или Инструментарий ( Toolkit ).',
                            'url' => 'App\Http\Controllers\CreationalPatternsController@AbstractFactory',

                            'text_guru' => 'Абстрактная фабрика — это порождающий паттерн проектирования, который позволяет создавать семейства связанных объектов, не привязываясь к конкретным классам создаваемых объектов.',
                            'url_guru' => 'https://refactoring.guru/ru/design-patterns/abstract-factory',
                            'url_guru1' => 'https://refactoring.guru/ru/design-patterns/factory-comparison',

                            'text_wiki' => 'Абстрактная фабрика (англ. Abstract factory) — порождающий шаблон проектирования, предоставляет интерфейс для создания семейств взаимосвязанных или взаимозависимых объектов, не специфицируя их конкретных классов. Шаблон реализуется созданием абстрактного класса Factory, который представляет собой интерфейс для создания компонентов системы (например, для оконного интерфейса он может создавать окна и кнопки). Затем пишутся классы, реализующие этот интерфейс.',
                            'url_wiki' => 'https://ru.wikipedia.org/wiki/Абстрактная_фабрика_(шаблон_проектирования)',

                            'text_habr' => 'Шаблон «Абстрактная фабрика» описывает способ инкапсулирования группы индивидуальных фабрик, объединённых некой темой, без указания для них конкретных классов.',
                            'url_habr' => 'https://habr.com/ru/company/vk/blog/325492/',

                            'text_designpatternsphp' => 'Cоздание рядов связанных или зависимых объектов без указания их конкретных классов. Обычно все созданные классы реализуют один и тот же интерфейс. Клиент абстрактной фабрики не заботится о том, как эти объекты создаются, он просто знает, как они сочетаются друг с другом.',
                            'url_designpatternsphp' => 'https://designpatternsphp.readthedocs.io/ru/latest/Creational/AbstractFactory/README.html',

                            'text_andrey.moveax' => 'Абстрактная фабрика предоставляет интерфейс, позволяющий порождать семейства объектов c заданными интерфейсами. При этом их реализации могут варьироваться.',
                            'url_andrey.moveax' => 'https://andrey.moveax.ru/post/patterns-oop-creational-abstract-factory',
                        ];

        return $description;
	}

}

