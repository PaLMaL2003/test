<?php
// Путь к вашему проекту
$projectPath = __DIR__;

// Получаем текущую дату и время
$commitMessage = 'Автоматический деплой: ' . date('Y-m-d H:i:s');

// Команды для деплоя
$commands = [
    "cd $projectPath",
    "git add .",
    "git commit -m \"$commitMessage\"",
    "git push origin main" // Измените main на master, если используется master
];

// Выполнение команд
foreach ($commands as $command) {
    exec($command, $output, $resultCode);
    if ($resultCode !== 0) {
        echo "Ошибка при выполнении команды: $command\n";
        echo implode("\n", $output);
        exit(1);
    }
}

echo "Деплой завершен успешно.\n";
