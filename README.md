# ⚡️ WP + Vite Starter Theme

Чистая и быстрая заготовка для разработки тем WordPress с использованием Vite.

## 📁 Структура
- `src/assets/` — Исходники (JS, SCSS, fonts).
- `dist/` — Скомпилированные файлы (создается автоматически).
- `inc/vite.php` — Логика подключения скриптов и HMR.
- `template-parts/` — Переиспользуемые блоки темы.

В файле `package.json` измени поле `"name"` на уникальное имя новой темы (строчными латинскими буквами, без пробелов, например: `"auto-drive-theme"`).

В файле `vite.config.js` изменить строку 9 на название своей темы 
        '/wp-content/themes/`my-theme`/dist/'

В файле `style.css` изменить Theme Name:
           

### 🚀 Запуск
- `npm install` — Установка зависимостей.
- `npm run dev` — Режим разработки (HMR).

- `npm run build` — Сборка проекта для продакшена в `/dist`.


### ⚙️ Переключение режимов (DEV / PROD)
Управление темой происходит через константу в `functions.php`:
```php
define('IS_VITE_DEVELOPMENT', true); // true — разработка | false — продакшен
```


### 🎨 Динамические цвета (ACF / Custom Fields)
В `header.php` выводятся глобальные CSS-переменные, привязанные к кастомным полям темы (с фолбеком на случай отключенного плагина ACF):
```html
<style>
    :root {
        --theme-color: <?php echo function_exists('get_field') ? (get_field('main_color', 'option') ?: '#ff0000') : '#ff0000'; ?>;
        --bg-color: <?php echo function_exists('get_field') ? (get_field('site_bg', 'option') ?: '#antiquewhite') : '#antiquewhite'; ?>;
    }
</style>
```


### 🔡 Алгоритм работы со шрифтами
Чтобы избежать ошибок 404 внутри WordPress, следуй правилам:

В файле `inc/vite.php` настроено условие: в режиме разработки шрифты работают через CDN, а в продакшене — локально. 


1. **В режиме разработки (`true`)**:
   - В файле inc/vite.php внутри `if ($is_development)` автоматически срабатывает подключение через CDN Google:
     ```php
     wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;800&display=swap', [], null); // заменить свои шрифты 
     ```
   - Строка `@use "./base/fonts";` в файле `main.scss` **должна быть закомментирована**.

2. **Перед деплоем / билдом (`false`)**:
   - Логика переходит в блок `else`, где Google Fonts CDN отключаются, а стили берутся из папки `dist`.
   - **Обязательно раскомментируй** `@use "./base/fonts";` в `main.scss`, чтобы локальные файлы скомпилировались и попали в итоговую сборку.


### 🏁 Чек-лист для деплоя (Production)
1. В `main.scss` **раскомментируй** строку `@use "./base/fonts";`.
2. В `functions.php` измени значение константы на **`false`**:
   ```php
   define('IS_VITE_DEVELOPMENT', false);   
   ```

3. Запусти в терминале команду сборки:
   npm run build