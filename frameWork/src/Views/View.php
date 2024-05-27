<?php 

namespace src\Views; // Объявляем пространство имён через namespace

class View{ // Объявляем класс View с приватным свойством path
    public function __construct(private $path){} // Конструктор класса с одним обязательным аргументом path

    public function renderHtml(string $templateName, $vars=[], $code=200){ // Объявляем метод, который отвечает за рендер шаблонов
        http_response_code($code); // Устанавливаем код http ответа
        extract($vars); // Извлекает переменные, чтобы они были доступны в шаблоне
        require($this->path.$templateName.'.php'); // Подключает файл шаблона, используя путь к директории шаблонов, хранящийся в свойстве $path, и имя шаблона, переданное в аргументе $templateName
    }
}