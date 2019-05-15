<?php

declare(strict_types=1);

namespace Api\Data\Fixture\Dev;

use Api\Infrastructure\Model\Id\Id;
use Api\Model\Text\Entity\Text\Text;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

final class TextFixture extends \Api\Data\Fixture\Base\TextFixture
{
    const SLUG_SLOGAN = 'slogan';
    const SLUG_NAVIGATION = 'navigation';
    const SLUG_ABOUT = 'about';
    const SLUG_VALUES = 'values';
    const SLUG_VALUE_ITEMS = 'value-items';
    const SLUG_PROJECTS = 'projects';
    const SLUG_JOBS = 'jobs';
    const SLUG_APPLY_FOR_JOB = 'apply-for-job';
    const SLUG_CONTACTS = 'contacts';
    const SLUG_WHO_WE_NEED = 'who-we-need';
    const SLUG_EXPERIENCE = 'experience';
    const SLUG_WRITE = 'write';
    const SLUG_APPLY = 'apply';
    const SLUG_NAME = 'name';
    const SLUG_EMAIL = 'email';
    const SLUG_PHONE = 'phone';
    const SLUG_DESCRIPTION = 'description';
    const SLUG_ATTACH_CV = 'attach-cv';
    const SLUG_AGREEMENT_PERSONAL_DATA = 'agreement-personal-data';
    const SLUG_SEND = 'send';
    const SLUG_SEND_SUCCESS = 'send-success';

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $manager->clear();

        $manager->persist($this->getGreetingRu());
        $manager->persist($this->getGreetingEn());

        foreach ($this->getData() as $datum) {
            $text = new Text(...$datum);
            $text->publish();
            $manager->persist($text);
        }

        $manager->flush();
    }

    /**
     * @return array
     * @throws Exception
     */
    private function getData(): array
    {
        return [
            [
                Id::next(),
                $this->getLanguageRu(),
                'Слоган',
                self::SLUG_SLOGAN,
                <<<HTML
<p>К будущему — в настоящем</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Slogan',
                self::SLUG_SLOGAN,
                <<<HTML
<p>To the future - in the present</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Навигация',
                self::SLUG_NAVIGATION,
                <<<HTML
<p>Используйте клавиши на клавиатуре,<br>чтобы начать перемещение по сайту.</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Navigation',
                self::SLUG_NAVIGATION,
                <<<HTML
<p>Use the keys on the keyboard to start navigating the site.</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'О нас',
                self::SLUG_ABOUT,
                <<<HTML
<p>В человеке живёт мечта покорения космоса. Представления о нём меняются с ходом эпох, космос остаётся неизученным и едва достижимым, но веками наш взгяд устремлён в небеса. Космос - метафора неутолимой жажды познания.</p>
<p>Мы создали свой COSMOS. Стремление превзойти самих себя; готовность выйти за рамки обычных атмосфер; и уменя, чтобы выжить за их пределами - практическое проявление этой жажды, которое нас объединяет.</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'About',
                self::SLUG_ABOUT,
                <<<HTML
<p>The dream of conquering space lives in a person. Ideas about it change with the course of epochs, the cosmos remains unexplored and barely achievable, but for centuries our glance has been directed to heaven. Cosmos - a metaphor of an insatiable thirst for knowledge</p>
<p>We created our own COSMOS. The desire to transcend themselves; willingness to go beyond ordinary atmospheres; and the ability to survive beyond them is a practical manifestation of this thirst that unites us.</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Наши ценности',
                self::SLUG_VALUES,
                <<<HTML
<p>COSMOS - это пространство, в которое выходят подготовленными. Мы создаём среду роста для компетентных IT-специалистов, готовых превосходить себя.</p>
<p>В COSMOS нет микроменеджмента и жестких бюрократических структур. Мы создаём порядок, культивируя ответственность и мастерство.</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Our values',
                self::SLUG_VALUES,
                <<<HTML
<p>COSMOS - it's a space in which go out prepared. We create a growth environment for competent IT-specialists who are ready to transcend themselves.</p>
<p>There is no micromanagement and rigid bureaucratic structures in COSMOS. We create order by cultivating responsibility and skill.</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Значения ценностей',
                self::SLUG_VALUE_ITEMS,
                <<<HTML
<p>Качество, Ответственность, Созидание, Мастерство, Опыт, Сила</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Value items',
                self::SLUG_VALUE_ITEMS,
                <<<HTML
<p>Quality, Responsibility, Creation, Mastery, Experience, Strength</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Наши проекты',
                self::SLUG_PROJECTS,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Our projects',
                self::SLUG_PROJECTS,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Хочешь в команду?',
                self::SLUG_JOBS,
                <<<HTML
<p>COSMOS - это среда совершений.</p>
<p>Мы собираем под своей крышей замечательных представителей своих профессий, объединённых одной целью: созавать лучшие коммерческие решения сегодня, сейчас. И бросаем все силы на создание условий работы, отвечающих их стандартам.</p>
<p>Посмотри наши вакансии и если ты считаешь, что подходишь - смело присылай своё резюме!</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Do you want a team?',
                self::SLUG_JOBS,
                <<<HTML
<p>COSMOS is an accomplishment environment.</p>
<p>We gather under our roof wonderful representatives of our professions, united by one goal: to convene the best commercial decisions today, now. And we throw all the strength to create working conditions that meet their standards.</p>
<p>Look at our vacancies and if you think that you are suitable - feel free to send your resume!</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Устроиться на работу',
                self::SLUG_APPLY_FOR_JOB,
                <<<HTML
<p>Не нашел подходящей вакансии?<br>Напиши нам и отправь своё резюме!</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Apply for a job',
                self::SLUG_APPLY_FOR_JOB,
                <<<HTML
<p>Didn't find a suitable job?<br>Write us and send your resume!</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Что-то ещё?',
                self::SLUG_CONTACTS,
                <<<HTML
<p>Свяжись с нами! Или приезжай в гости!</p>
<p>129110, Москва, Олимпийский проспект, 16с5</p>
<p>+7 (929) 646 94 74</p>
<p>info@mercury-holding.com</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Something else?',
                self::SLUG_CONTACTS,
                <<<HTML
<p>Contact us! Or come to visit!</p>
<p>129110, Moscow, Olympic Avenue, 16b5</p>
<p>+7 (929) 646 94 74</p>
<p>info@mercury-holding.com</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Кто нам нужен?',
                self::SLUG_WHO_WE_NEED,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Who do we need?',
                self::SLUG_WHO_WE_NEED,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Необходимый опыт',
                self::SLUG_EXPERIENCE,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Experience',
                self::SLUG_EXPERIENCE,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Написать',
                self::SLUG_WRITE,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Write',
                self::SLUG_WRITE,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Откликнуться',
                self::SLUG_APPLY,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Apply',
                self::SLUG_APPLY,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Ваше имя',
                self::SLUG_NAME,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Your name',
                self::SLUG_NAME,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Ваш e-mail',
                self::SLUG_EMAIL,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Your e-mail',
                self::SLUG_EMAIL,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Ваш телефон',
                self::SLUG_PHONE,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Your phone',
                self::SLUG_PHONE,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Кратко расскажите о себе или дайте ссыкли на ваше резюме и портфолио',
                self::SLUG_DESCRIPTION,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'About you',
                self::SLUG_DESCRIPTION,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Прикрепить ваше резюме',
                self::SLUG_ATTACH_CV,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Attach CV',
                self::SLUG_ATTACH_CV,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Согласен на обработку персональных данных',
                self::SLUG_AGREEMENT_PERSONAL_DATA,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Agree',
                self::SLUG_AGREEMENT_PERSONAL_DATA,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Отправить',
                self::SLUG_SEND,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Send',
                self::SLUG_SEND,
                ''
            ],
            [
                Id::next(),
                $this->getLanguageRu(),
                'Сообщение успешно отправлено',
                self::SLUG_SEND_SUCCESS,
                <<<HTML
<p>Сообщение успешно отправлено. Отправить ещё.</p>
HTML
            ],
            [
                Id::next(),
                $this->getLanguageEn(),
                'Message sent successfully',
                self::SLUG_SEND_SUCCESS,
                <<<HTML
<p>Message sent successfully. Send more.</p>
HTML
            ],
        ];
    }
}
