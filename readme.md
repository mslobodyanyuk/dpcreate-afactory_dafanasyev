Design Pattern ►[ Abstract Factory ] ► Lesson #5
================================================

* ***Actions on the deployment of the project:***

- Making a new project dpcreate-afactory_dafanasyev.loc:
																	
	sudo chmod -R 777 /var/www/DESIGN_PATTERNS/Creational/dpcreate-afactory_dafanasyev.loc

	//!!!! .conf
	sudo cp /etc/apache2/sites-available/test.loc.conf /etc/apache2/sites-available/dpcreate-afactory_dafanasyev.loc.conf
		
	sudo nano /etc/apache2/sites-available/dpcreate-afactory_dafanasyev.loc.conf

	sudo a2ensite dpcreate-afactory_dafanasyev.loc.conf

	sudo systemctl restart apache2

	sudo nano /etc/hosts

	cd /var/www/DESIGN_PATTERNS/Creational/dpcreate-afactory_dafanasyev.loc

- Deploy project:

	`git clone << >>`
	
	`or Download`
	
	_+ Сut the contents of the folder up one level and delete the empty one._

	`composer install`
---

Dmitry Afanasyev

[Design Pattern ►[ Abstract Factory ] ► Lesson #5 (30:47)]( https://www.youtube.com/watch?v=8QylIGRYU7k&list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&index=1&t=311s&ab_channel=DmitryAfanasyev )

Creational design patterns - Abstract Factory. We study a design template (pattern) from a family of factories.
An Abstract Factory is a generative design pattern that allows you to create families of related objects without being tied to the specific classes of objects you create.

	composer create-project --prefer-dist laravel/laravel
	
_+ Сut the contents of the folder up one level and delete the empty one._

	php artisan make:controller CreationalPatternsController

Error: 
_"... Permission denied"_

	sudo chmod -R 777 /var/www/DESIGN_PATTERNS/Creational/dpcreate-afactory_dafanasyev.loc

Error: 
_"Target class [CreationalPatternsController] does not exist."_
		
<https://stackoverflow.com/questions/63807930/target-class-controller-does-not-exist-laravel-8>		
		
Add route in `routes/web.php`:

```php
use App\Http\Controllers\CreationalPatternsController;

Route::get('/', [CreationalPatternsController::class, 'AbstractFactory'])->name('dump');
```

	php artisan config:cache	
	php artisan config:clear

Error:
_"Class 'Debugbar' not found"_

<https://bestofphp.com/repo/barryvdh-laravel-debugbar-php-debugging-and-profiling>

	composer require barryvdh/laravel-debugbar --dev
	
[(0:05)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=5 ) In this video, we will look at the Design Pattern `Abstract Factory`, OR its second name `Toolkit`.
The name `Abstract Factory`, as in the case of the Interface Pattern, can be misleading. And we can assume that the word "Abstract" is from PHP. - Some Abstract class from which it will be necessary to Inherit,
Create some other Classes. In fact, this is NOT the case, and just the name `Toolkit` is more logical and understandable for this Design Pattern.
BUT for some reason EVERYONE calls `Abstract Factory`.

![screenshot of sample]( https://github.com/mslobodyanyuk/dpcreate-afactory_dafanasyev/blob/main/public/images/firefox1.png )

<https://ru.wikipedia.org/wiki/Абстрактная_фабрика_(шаблон_проектирования)>

[(1:00)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=60 ) Let's start with a definition.

I wrote out various definitions here, from various sources where I drew information. In the case of the `Abstract Factory` they ALL converge to one. In different words, in different examples, they explain
and yet we get one interpretation of what an `Abstract Factory` is. - You can't say about other Factories, well, `Factory Method` is also almost the same.

[(1:35)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=95 )

_"An Abstract Factory is a Creational Design Pattern that allows you to create families of related objects without being tied to the specific classes of objects you create."_

Here the key point is that this is a "family of objects". That is, we have a certain Class that we can Create exactly a family of objects. NOT one object, but a family.
And this is a family of objects, they can somehow intertwine with each other, somehow they can work. We can have several families - different families of objects. Sometimes we need one family of objects, sometimes we need another.
BUT NOT so that here some Classes( - from one family ) will work with these( - from another family ) - NO. We take a pool of objects this OR another. It could be some kind of `run-time` switch.
OR we can change in the Application Settings in the config you specify - now we are working with this family. And your site works with this family of objects. And the Class that will provide access to them, generate and give to you,
here it is called `Abstract Factory`.

That is, IF you have some kind of Switch AND you have two `Abstract Factories`, they can respectively Create objects OR those OR those. And, provided that we will operate with Interfaces. - That is, they must be interchangeable.
IF you specify in the config that Factory "A" works, ALL objects that will Spawn this Class, this Factory must Implement a certain Interface. And the same Interfaces must be Implemented by another family, Factory "B".
To spawn objects, those objects must Implement the same Interfaces. IF this is followed, then we can Switch and the object families will be replaced with us. We have Application b to change its Behavior in one way or another.

[(4:10)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=250 ) ALL other definitions say almost the same thing.

_"The Abstract Factory Pattern describes a way to encapsulate a group of individual factories, united by a theme, without specifying specific classes for them."_

[(5:10)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=310 ) What can we conclude. The Abstract Factory is still our `Toolkit`. And we can have one OR more of these `Toolkits`,
groups of objects with which we work. We can EITHER choose one group of objects, OR another. BUT they should NOT intersect.

[(5:40)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=340 ) Let's look at an Example of how we can Implement this Design Pattern.

And so, we have some kind of Application that draws the user interface. And let's say it uses `bootstrap` for this. It turns out `bootstrap` is we have `Toolkit`.
We can Draw Buttons with `bootstrap`, we can Draw Buttons with Checkbox. IF we do NOT use the `Abstract Factory` and in our Application, this `bootstrap` will be "tightly" sewn everywhere,
and suddenly, for no apparent reason, after many years of our Application being alive, the Customer tells us: "Let's make a Theme Switcher. So in the config I want to have `bootstrap` on even days, and on -odd some `semanticui`.
OR how authorized users can Switch Interface..."

[(8:45)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=525 ) The task is clear, here we have EVERYTHING on `bootstrap`, and we know that we will have this Switch and now we will consider how this Switch can be Implemented.
The Implementation method is called `Abstract Factory`. - We will essentially Create `Abstract Factories`, `Tools`. We will have two `Tools`. `Toolkit`, with the help of which We draw the elements of the form `bootstrap`, `Toolkit`,
with which Draw `semanticui`.

[(9:50)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=590 ) `CreationalPatternsController.php`

We have some `Toolkit` `guiKit`, and we turn to it - give us a Button. We are NOT saying give us a `bootstrap` button, give us a `semanticui` button. We abstract from it. And this Button must have a `draw()` method.
That is, this Button should do `implements` to do, Implement an Interface, which will contain what the `draw()` method should be, Draw. And in `semanticui` we will do the same.

```php
$result = $this->guiKit->buildButton()->draw();
$result = $this->guiKit->buildCheckBox()->draw();
```

As we can see, our Application does NOT know what object will come to it. He doesn't care. It relies ONLY on the Interface, and it should be, and IF it is Implemented, then EVERYTHING will be fine.

[(10:55)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=655 ) We drew some form, with this approach, when we change `bootstrap` to `semanticui` in the Settings, then in ALL the rest of the code we will NOT need to change.
The setting in this case occurs in the constructor. We initialize the `guiKit` variable and get some `kit`( - Toolkit ) there, which, as we see, is `bootstrap`.

```php
public function __construct()
{
	$this->guiKit = ( new GuiKitFactory())->getFactory('bootstrap');
}
```

[(11:40)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=700 )

![screenshot of sample]( https://github.com/mslobodyanyuk/dpcreate-afactory_dafanasyev/blob/main/public/images/firefox2.png ) 

Will work and in `"Messages"` will reset the result of processing. Processing result Throws us, just, the `draw()` method.
Method `draw()` Buttons and method `draw()` Checkbox. We see that we have a `bootstrap` button rendered.

And let's say we want to Switch to `semanticui`.

```php
$this->guiKit = ( new GuiKitFactory())->getFactory('semanticui');
```

[(12:15)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=735 ) `Refresh Browser(F5)`

![screenshot of sample]( https://github.com/mslobodyanyuk/dpcreate-afactory_dafanasyev/blob/main/public/images/firefox3.png )

That is, IF we really had an Interface now, then the ENTIRE Interface would be transformed. We have Switched the UI Interface from `bootstrap` to `semanticui`, provided that we adhered to Interfaces when Creating objects of different Factories. 

[(12:55)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=775 ) "In details."

In this case, `GuiKitFactory` is actually implied in Abstract Factory, BUT it is NOT Abstract Factory. On the one hand, this "Switcher" can also be added to the Template, because as WITHOUT it, BUT on the other hand - NO.
Abstract Factory we have `BootstrapFactory()` and `SemanticUiFactory()`. That is, `Toolboxes` are those Factories that Spawn groups of certain interconnected objects. They may not be related, they may be of the same family ...

[(14:55)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=895 ) `getFactory($type)`

Returns some `kit`, some `Abstract Factory` and this Factory must also Implement an Interface. In this case, `GuiFactoryInterface.php`.

[(15:05)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=905 ) `GuiFactoryInterface.php`

We "say" IF We create an `Abstract Factory`, it should have two methods.

- public function buildButton(): ButtonInterface;

- public function buildCheckBox(): CheckBoxInterface;

[(15:35)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=935 ) `ButtonInterface.php`

- `public function draw();`

[(15:37)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=937 ) `CheckBoxInterface.php`

- `public function draw();`

[(16:00)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=960 ) `BootstrapFactory.php`

[(16:25)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=985 ) `ButtonBootstrap.php`

[(16:40)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=1000 ) The same `CheckBoxBootstrap()` must Implement the Interface `CheckBoxInterface`.

And ONLY with such strong typing, we can Make one OR more families that can interchange each other.

`EVERYTHING is built on Interfaces.`

[(17:10)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=1030 )
_"Back to our controller, `CreationalPatternsController.php`. Let's go through it again..."_

We Request some Interface, "tell" what we need it... Here is the "Switch" ( `BootstrapFactory` <-> `SemanticUiFactory` ).
Also in `SemanticUiFactory` we are required to Implement `buildButton()` because it is `GuiFactoryInterface.` - IF we DO NOT Implement it we will have an Error. - IF We implement NOT correctly, it will also indicate that it is necessary to specify correctly.

[(17:50)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=1070 ) Here, in fact, is EVERYTHING. A fairly simple and powerful way to work with classes-families of objects, the ability to switch them.

---

[(18:25)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=1105 ) 
_"Let's see Examples of those sources that I read."_

The most pleasant, interesting, smart site is
<https://refactoring.guru/en/design-patterns/abstract-factory> - Highly recommended.

[(20:55)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=1255 )
_"Judging by the drawing, the `Abstract Factory` is called just the Switch."_

[(22:25)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=1345 )
_"Comparison of factories"_

<https://refactoring.guru/ru/design-patterns/factory-comparison>

"6. Pattern Abstract factory
The Abstract Factory pattern is a class device that makes it easy to create families of products.

What is a product family? For example, classes Transport + Engine + Control. Variations of this family can be:

Car + CombustionEngine + Steering Wheel
Aircraft + JetEngine + Rudder
If you don't have product families, then you can't have an abstract factory.

Many people confuse the Abstract Factory Pattern with a Simple Factory class declared as abstract, but they are far from the same thing!"

---

[(24:00)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=1440 )

[ Example with the installation of doors of different types by different specialists. ]( https://habr.com/ru/company/vk/blog/325492/ )

---

[(28:20)]( https://youtu.be/8QylIGRYU7k?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=1700 ) 

<https://designpatternsphp.readthedocs.io/en/latest/Creational/AbstractFactory/README.html> - "It gives the impression that EVERYTHING is cool and EVERYTHING is right. This site, as far as Factories is concerned, is the last place to go to read about these Factories..."

#### Useful links:

Dmitry Afanasyev

[Design Pattern ►[ Abstract Factory ] ► Lesson #5]( https://www.youtube.com/watch?v=8QylIGRYU7k&list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&index=1&t=311s&ab_channel=DmitryAfanasyev )

<https://stackoverflow.com/questions/63807930/target-class-controller-does-not-exist-laravel-8>

<https://bestofphp.com/repo/barryvdh-laravel-debugbar-php-debugging-and-profiling>

<https://ru.wikipedia.org/wiki/Абстрактная_фабрика_(шаблон_проектирования)>

Examples

<https://refactoring.guru/ru/design-patterns/abstract-factory>

<https://refactoring.guru/ru/design-patterns/factory-comparison>

[ Example with the installation of doors of different types by different specialists. ]( https://habr.com/ru/company/vk/blog/325492/ )
