document.addEventListener('DOMContentLoaded', () => {
    const shareBtn = document.getElementById('native-share-btn');

    if (!shareBtn) return;

    shareBtn.addEventListener('click', async function () {
        const url = this.getAttribute('data-url');
        const title = this.getAttribute('data-title');

        // Проверяем, поддерживает ли браузер системное окно "Поделиться"
        if (navigator.share) {
            try {
                await navigator.share({
                    title: title,
                    url: url
                });
            } catch (err) {
                // Игнорируем ошибку, если пользователь просто закрыл окно шеринга
                if (err.name !== 'AbortError') {
                    console.error('Ошибка шеринга:', err);
                }
            }
        } else {
            // Запасной вариант для старых ПК: копируем ссылку в буфер обмена
            try {
                await navigator.clipboard.writeText(url);

                // Меняем текст на кнопке на пару секунд, чтобы пользователь понял, что всё ок
                const originalText = this.innerHTML;
                this.innerHTML = 'Ссылка скопирована!';
                this.style.pointerEvents = 'none';

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.style.pointerEvents = 'auto';
                }, 2000);

            } catch (copyErr) {
                console.error('Не удалось скопировать:', copyErr);
            }
        }
    });
});

console.log('share');