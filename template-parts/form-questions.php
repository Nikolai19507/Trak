<section>
    <div class="feedback">
        <div class="container">
            <div class="feedback__content">
                <h2 class="feedback__title">ОСТАЛИСЬ ВОПРОСЫ?</h2>
                <p class="feedback__text">Оставьте свои контактные данные, и мы презвоним вам в ближайшее время</p>

                <form class="feedback-form">
                    <div class="feedback-form__field">
                        <label for="form-name" class="feedback-form__label">Имя</label>
                        <input type="text" name="user_name" id="form-name" class="feedback-form__input" placeholder="Имя">
                    </div>

                    <div class="feedback-form__field">
                        <label for="form-phone" class="feedback-form__label">Телефон</label>
                        <input type="tel" name="user_phone" id="form-phone" class="feedback-form__input" placeholder="+380">
                    </div>

                    <button type="submit" class="btn--fill feedback-form__btn">Позвонить</button>
                </form>

                <div class="feedback__policy">Нажимая на кнопку отправить Вы соглашаетесь на обработку Ваших персональных данных компание ООО «Рустрак»</div>
            </div>
        </div>
        <div class="feedback__bg">
            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/questions-bg.png" alt="">
        </div>
    </div>
</section>