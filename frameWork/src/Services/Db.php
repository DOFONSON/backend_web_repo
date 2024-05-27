<?php
namespace src\Services; // Объявляем namespace для создания синглтона для работы с бд

class Db{ // Создаём класс Базы данных
    private $pdo; // Приватное поле pdo
    private static $instance; // Приватное статическое поле instance для хранения экземпляра класса

    private function __construct(){ // Приватная функция конструктор, которая инициализирует pdo
        $dbOptions = require('settings.php'); // Подключаем файл settings.php с настройками для бд
        $this->pdo = new \PDO( // Указываем, что для этого pdo мы создаём новый объект PDO
            'mysql:host='.$dbOptions['host'].';dbname='.$dbOptions['dbname'], // С помощью конкатенации мы записываем DSN для подключения к бд mysql: - указывает, что мы используем драйвер MySQL для подключения к базе данных. host= - указывает хост, на котором расположена база данных. В данном случае значение хоста берется из массива $dbOptions, который был подключен с помощью require('settings.php'). dbname= - указывает имя базы данных, с которой нужно работать.
            $dbOptions['user'],
            $dbOptions['password']
        ); // Передаём параметры для создания объекта PDO
    }

    public static function getInstance(){ // Статический метод, который возвращает экземпляр класса
        if (self::$instance === null){ // Если экземпляр не создан, создаём его с помощью функции коструктора и возвращаем его
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function query(string $sql, $params = [], string $className='stdClass'): ?array // Метод для выполнения запроса к бд. Она принимает 3 параметра: строка с запросом к базе данных, массив параметров для запроса, имя класса, который будет использоваться для создания объектов из результатов запроса
    {
        $sth = $this->pdo->prepare($sql); // Подготавливаем запрос
        $result = $sth->execute($params); // Выполняем запрос 
        if ($result === false){
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className); // Если запрос выполнен успешно, возвращаем массив объектов, созданных из результатов запроса с помощью метода fetchAll объекта PDO. Иначе вернём null     
    }
}