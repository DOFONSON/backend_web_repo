<?php
namespace src\Models; // Создаём пронстранство имён
use src\Services\Db; // Импортируем класс Db

abstract class ActiveRecordEntity{ // Создаём абстрактный класс ActiveRecordEntity, который будет родительский для всех моделей, использующих паттерн Active Record. Абстрактный класс не может быть инстанцирован напрямую и должен быть унаследован другими классами
    protected $id; // Создаём защищённое св-во id, которое будет хранить уникальный идентификатор записи в базе данных

    public function __set($key, $value){ //Метод __set, который позволяет устанавливать значение свойству объекта, преобразуя имя свойства из snake_case в camelCase
        $property = $this->formatToCamelcase($key); // Применяем приватный метод
        $this->$property = $value;
    }

    private function formatToCamelcase($key){ // Преобразует строку из snake_case в camelCase
        return lcfirst(str_replace('_', '', ucwords($key,'_')));
    }

    private function formatToBd($key) { // Преобразует строку из camelCase в snake_case.
        return strtolower(preg_replace('/([A-Z])/', '_$1', $key));
    }
    
    public function getId() // Метод, который возвращает значение свойства id этого класса
    {
        return $this->id;
    }

    public static function findAll(): ?array // Статический метод, который возвращает массив всех записей из таблицы, которые соответствуют данной модели
    {
        $db = Db::getInstance(); // Получаем экземпляр класса Db
        $sql = 'SELECT * FROM `'.static::getTableName().'`'; // Метод static::getTableName будет создан у каждого потомка этого класса для получения имени нужной нам таблицы
        // var_dump($sql);
        return $db->query($sql,[],static::class); // Далее возвращаем массив объектов, полученный в результате запроса к бд, используя метод query класса Db
    }

    public static function getById(int $id): ?self // Статический метод, который возвращает запись из бд по её id или, благодаря типизации и знаку вопросика null
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'` WHERE `id`='.$id; // с помощью конкатенации создаём строку, которую подадим в бд
        $result = $db->query($sql, [], static::class);
        return $result ? $result[0] : null; // Возвращает первый элемент сформированного массива или null, если ничего не найдено.
    }

    public function save(){ // Метод, который сохраняет объект в бд
        // var_dump($this->getPropertyToDB());
        if ($this->getId()) $this->update(); // Если уже имеется такой id, выполняется обновление, иначе вставка новой записи.
        else $this->insert();
    }

    private function insert() { // Создаём приватную функцию insert, которая записывает новую запись в бд
        $db = Db::getInstance(); // Записываем в db инстанс класса
        $nameField = []; // объявляем переменные с которыми будем работать
        $params = [];
        $paramsToValue = [];
        $fieldAndValue = array_filter($this->getPropertyToDB()); // Получаем массив свойств объекта для записи в БД
        // var_dump($fieldAndValue);
        foreach ($fieldAndValue as $field => $value) { // Для каждого свойства производим итерацию
            $nameField[] = '`'.$field.'`'; // Добавляем имя поля в массив
            $param = ':'.$field; // Формируем параметр запроса
            $params[] = $param; // Добавляем параметр в массив
            $paramsToValue[$param] = $value; // Связываем параметр с его значением
        }
        $sql = 'INSERT INTO `'.static::getTableName().'`
                ('.implode(',', $nameField).') 
                VALUES ('.implode(',', $params).')'; // Пишем sql запрос с помощью конкатенации
        // var_dump($sql);
        $db->query($sql, $paramsToValue, static::class); // Обращаемся к бд
    }

    private function update() {
        $db = Db::getInstance(); // Получаем экземпляр класса Db
        $data = $this->getPropertyToDB(); // Получаем массив свойств объекта для записи в БД
        $params = []; // Объявляем переменные
        $paramsAndValue = [];
        foreach ($data as $property => $value) { // Для каждого поля производим итерацию
            $param = ':'.$property;
            $params[] = '`'.$property.'`='.$param;
            $paramsAndValue[$param] = $value; // Формируем итоговое поле
        }
        $sql = 'UPDATE `'.static::getTableName().'`
                SET '.implode(',', $params).' WHERE `id`=:id'; // Формируем запрос
        $db->query($sql, $paramsAndValue, static::class); // обращаемся к бд
    }

    private function getPropertyToDB():array{ // Возвращает массив имён и значений свойств объекта, преобразованных в snake_case для использования в базе данных.
        $nameAndValue = []; // Создаём пустой массив
        $reflector = new \ReflectionObject($this); // Создаётся объект класса \ReflectionObject, который предоставляет возможность манипулировать текущим экземпляром класса с помощью механизмов рефлексии
        $properties = $reflector->getProperties(); // Возвращает массив объектов ReflectionProperty, каждый из которых представляет свойство текущего объекта
        foreach($properties as $property){ // Для каждого из свойств:
            $nameCamelCase = $property->getName(); // Возвращаем имя свойства
            $nameToDb = $this->formatToBd($nameCamelCase);  // Переводим в snake_case
            $nameAndValue[$nameToDb] = $this->$nameCamelCase; // Значение свойства объекта $this->$nameCamelCase присваивается соответствующему ключу в массиве $nameAndValue.
        }

        return $nameAndValue; // Возвращаем массив
    }

    abstract protected static function getTableName(); // Создаём функцию getTableName, которая будет у каждого инстанса
}