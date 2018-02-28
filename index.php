<!--Домашнее задание к лекции 3.3 «Пространства имен, перегрузка и встроенные интерфейсы и классы»
1. Распишите свое понимание пространства имен. (Представьте, что вас спрашивают на собеседовании).
Пространство имен - это своего рода хранилище файлов с классами в разных каталогах на диске C:\ или др.носителях информации. Используется пространство имен для того, чтобы можно было использовать классы, методы и т.д. с одинаковыми именами и они не приводили к ошибке в исполняемом коде, за счет того, что у них разные пути до исполняемого кода. Пространство имен позволяет так же подключать сторонние библиотеки.

2. Распишите свое понимание исключений (Exception) и зачем они нужны. (Представьте, что вас спрашивают на собеседовании).
Исключения - это механизм, помагающий обрабатывать ошибки на уровне кода или логики, а не игнорирование их. Мы можем сами определять поведение в случае ошибки.
-->

<?php

//3. Сделайте класс Товар из прошлого ДЗ абстрактным суперклассом для всех остальных классов.

class BaseProductClass {
	public $title;
	public $category;
	public $description;
	public $weight;
	public $price;
	public $discount;
	public $delivery;

    public function __construct($title, $category, $price, $weight)
    {
            $this->title = $title;
            $this->category = $category;
            $this->price = $price;
            $this->weight = $weight;
            echo "Продукт:  $this->title";
    } 
}

	trait getProductPrice //стандартная стоимость продукта
	{
		public function getPrice() 
		{
			echo "<br>Стоимость товара: {$this->price} руб.";
		}
	}

	trait getProductDiscount // стоимость продукта со скидкой
	{
		public function getDiscountPrice()
		{	
			$this->discount = 10;
			$this->priceDisc = round(($this->price - $this->price * $this->discount / 100),2);
			echo "<br>Стоимость товара со скидкой: {$this->priceDisc} руб. Скидка: {$this->discount}%";
		}
	}

	trait getWeightDiscount // стоимость продукта со скидкой
	{
		public function getWeightDiscount()
		{	
			if ($this->weight > 10) {
				$this->discount = 10;
				$this->priceDisc = round($this->price - ($this->price * $this->discount / 100));
				echo "<br>Стоимость товара со скидкой: {$this->priceDisc} руб. Скидка: {$this->discount}%";
			} 
			else {
				$discount = 0;
				echo "<br>Стоимость товара без скидки: {$this->price} руб.";
			}
		}
	}

	trait getDelivery // стоимость доставки
	{
		public function getDeliveryPrice()
		{
			if ($this->discount == 0) {
            	$this->delivery = 250;
            } 
            else {
            	$this->delivery = 300;
            }
            echo "<br>Стоимость доставки: {$this->delivery} руб. ";
		}
	}


class ComputerClass extends BaseProductClass {
	use getProductDiscount, getDelivery;
}

$sysBlock = new ComputerClass("Системный блок", "Компьютеры", 30000, 3);
echo $sysBlock->getDiscountPrice();
echo $sysBlock->getDeliveryPrice()."<br><hr>";

class SmartfonClass extends BaseProductClass {
	use getProductPrice, getDelivery;
}

$smartFon = new SmartfonClass("Смартфон", "Смартфон", 60000, 0.150);
echo $smartFon->getPrice();
echo $smartFon->getDeliveryPrice()."<br><hr>";

class FridgeClass extends BaseProductClass {
	use getProductDiscount,getDelivery,getWeightDiscount;
}

$Fridge = new FridgeClass("Холодильник", "Бытовая техника", 20000, 16);
echo $Fridge->getWeightDiscount();
echo $Fridge->getDeliveryPrice()."<br><hr>";

//4. Придумайте свое пространство имен (для всех классов), распределите все классы и интерфейсы по директориям и напишите свой autoloader.


//5. Опишите класс Корзина, в который можно передавать любой товар. Опишите у корзины нужные свойства и методы. Например, метод получения суммы заказа, удаление товара из корзины и т.д.


//6. Опишите класс Заказ, который создается на основе Корзины и имеет методы для оформления и печати (вывода на экран) информации о заказе.

//Дополнительное задание:
//Использовать исключения для некорректной логики. Например, у товара нет цены и в корзину такой товар не должен попасть.

?>