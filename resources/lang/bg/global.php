<?php

return [
	
	'user-management' => [
		'title' => 'Управление пользователями',
		'created_at' => 'Time',
		'fields' => [
		],
	],
	
	'permissions' => [
		'title' => 'Права доступа',
		'created_at' => 'Time',
		'fields' => [
			'title' => 'Наименование',
		],
	],
	
	'roles' => [
		'title' => 'Роли',
		'created_at' => 'Time',
		'fields' => [
			'title' => 'Наименование',
			'permission' => 'Права доступа',
		],
	],
	
	'users' => [
		'title' => 'Пользователи',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Имя',
			'email' => 'Почта',
			'password' => 'Пароль',
			'role' => 'Роль',
			'remember-token' => 'Запомнить меня',
		],
	],
	
	'courses' => [
		'title' => 'Курсы',
		'created_at' => 'Time',
		'fields' => [
			'teachers' => 'Teachers',
			'title' => 'Наименование',
			'slug' => 'Жетон',
			'description' => 'Описание',
			'price' => 'Price',
			'course-image' => 'Картинка для курса',
			'start-date' => 'Дата создания курса',
			'published' => 'Опубликовать',
		],
	],
	
	'lessons' => [
		'title' => 'Уроки',
		'created_at' => 'Time',
		'fields' => [
			'course' => 'Курс',
			'title' => 'Наименование',
			'slug' => 'Жетон',
			'lesson-image' => 'Картинка к уроку',
			'short-text' => 'Краткое описание',
			'full-text' => 'Полное описание',
			'position' => 'Позиция вопроса',
			'downloadable-files' => 'Скачиваемый файл',
			'free-lesson' => 'Free lesson',
			'published' => 'Опубликовать',
		],
	],
	
	'questions' => [
		'title' => 'Вопросы',
		'created_at' => 'Time',
		'fields' => [
			'question' => 'Вопрос',
			'question-image' => 'Картинка к вопросу',
			'score' => 'Количество баллов',
		],
	],
	
	'questions-options' => [
		'title' => 'Настройка вопроса',
		'created_at' => 'Time',
		'fields' => [
			'question' => 'Вопрос',
			'option-text' => 'Текст ответа',
			'correct' => 'Верный ответ',
		],
	],
	
	'tests' => [
		'title' => 'Тест',
		'created_at' => 'Time',
		'fields' => [
			'course' => 'Курс',
			'lesson' => 'Урок',
			'title' => 'Наименование',
			'description' => 'Описание',
			'questions' => 'Вопросы',
			'published' => 'Опубликовать',
		],
	],
	'app_create' => 'Создать',
	'app_save' => 'Сохранить',
	'app_edit' => 'Редактировать',
	'app_view' => 'Показать',
	'app_update' => 'Изменить',
	'app_list' => 'Лист',
	'app_no_entries_in_table' => 'Нет записей в таблице',
	'custom_controller_index' => 'Custom controller index.',
	'app_logout' => 'Выйти',
	'app_add_new' => 'Добавить новый элемент',
	'app_are_you_sure' => 'Вы уверены?',
	'app_back_to_list' => 'Обратно к списку',
	'app_dashboard' => 'Приборная панель',
	'app_delete' => 'Удалить',
	'global_title' => 'ProLearn',
];