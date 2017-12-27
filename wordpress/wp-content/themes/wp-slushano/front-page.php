<?php /* Template Name: Home Page */ get_header(); ?>






  <div class="left-content">
    <div class="reklama ads ads-1 styled-block"></div>
    <div class="welcome-block styled-block">
      <div class="text-in">
        <p><img src="img/olen.jpg" alt=""><strong>Подслушано по городам</strong> — уникальный проект, база пабликов Подслушано, пополняющаяся ежесекундно новыми секретами, откровениями, смешными историями реальных пользователей.</p>
        <p class="dop-text">Для вас, мы подготовили огромное количество городов, из <strong>6 стран:</strong> таких как Россия, Беларусь, Украина, Казахстан, Узбекистан и Польша. Проверьте - ваш город уже здесь.</p>
      </div>
    </div>
    <div class="styled-block">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, quisquam aliquam tempora. Consectetur odit sed fugiat quis labore blanditiis commodi, aspernatur saepe officia laborum? Laborum veritatis debitis dolores cum placeat.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, quisquam aliquam tempora. Consectetur odit sed fugiat quis labore blanditiis commodi, aspernatur saepe officia laborum? Laborum veritatis debitis dolores cum placeat.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, quisquam aliquam tempora. Consectetur odit sed fugiat quis labore blanditiis commodi, aspernatur saepe officia laborum? Laborum veritatis debitis dolores cum placeat.
    </div>
    <div class="city_list styled-block">
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <h1 class="page-title inner-title"><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <?php edit_post_link(); ?>

    </article>
  <?php endwhile; endif; ?>

      <h6><i class="fa fa-question-circle"></i> Для просмотра историй выберите страну или её область</h6>
      <ul class="list">
        <li class="item-id-4">
          <a href="http://slushano.ru/rossiya/"><img src="img/Russian-Federation.png" alt="Россия">Россия</a>
          <ul>
            <li> <a href="http://slushano.ru/rossiya/altajskij-kraj/">Алтайский край</a></li>
            <li> <a href="http://slushano.ru/rossiya/arhangel-skaya-oblast/">Архангельская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/astrahanskaya-oblast/">Астраханская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/belgorodskaya-oblast/">Белгородская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/bryanskaya-oblast/">Брянская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/vladimirskaya-oblast/">Владимирская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/volgogradskaya-oblast/">Волгоградская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/vologodskaya-oblast/">Вологодская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/voronezhskaya-oblast/">Воронежская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/evrejskaya-avtonomnaya-oblast/">Еврейская автономная область</a></li>
            <li> <a href="http://slushano.ru/rossiya/zabajkal-skij-kraj/">Забайкальский край</a></li>
            <li> <a href="http://slushano.ru/rossiya/ivanovskaya-oblast/">Ивановская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/irkutskaya-oblast/">Иркутская область‎</a></li>
            <li> <a href="http://slushano.ru/rossiya/kaliningradskaya-oblast/">Калининградская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/kaluzhskaya-oblast/">Калужская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/kamchatskij-kraj/">Камчатский край</a></li>
            <li> <a href="http://slushano.ru/rossiya/karachaevo-cherkesskaya-respublika/">Карачаево-Черкесская Республика</a></li>
            <li> <a href="http://slushano.ru/rossiya/kemerovskaya-oblast/">Кемеровская область‎</a></li>
            <li> <a href="http://slushano.ru/rossiya/kirovskaya-oblast/">Кировская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/kostromskaya-oblast/">Костромская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/krasnodarskij-kraj/">Краснодарский край</a></li>
            <li> <a href="http://slushano.ru/rossiya/krasnoyarskij-kraj/">Красноярский край</a></li>
            <li> <a href="http://slushano.ru/rossiya/kurganskaya-oblast/">Курганская область‎</a></li>
            <li> <a href="http://slushano.ru/rossiya/kurskaya-oblast/">Курская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/leningradskaya-oblast/">Ленинградская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/lipetskaya-oblast/">Липецкая область</a></li>
            <li> <a href="http://slushano.ru/rossiya/magadanskaya-oblast/">Магаданская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/moskovskaya-oblast/">Московская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/murmanskaya-oblast/">Мурманская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/nizhegorodskaya-oblast/">Нижегородская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/novgorodskaya-oblast/">Новгородская область‎</a></li>
            <li> <a href="http://slushano.ru/rossiya/novosibirskaya-oblast/">Новосибирская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/omskaya-oblast/">Омская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/orenburgskaya-oblast/">Оренбургская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/orlovskaya-oblast/">Орловская область‎</a></li>
            <li> <a href="http://slushano.ru/rossiya/penzenskaya-oblast/">Пензенская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/permskij-kraj/">Пермский край</a></li>
            <li> <a href="http://slushano.ru/rossiya/primorskij-kraj/">Приморский край</a></li>
            <li> <a href="http://slushano.ru/rossiya/pskovskaya-oblast/">Псковская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-ady-geya/">Республика Адыгея</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-altaj/">Республика Алтай</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-bashkortostan/">Республика Башкортостан</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-buryatiya/">Республика Бурятия</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-dagestan/">Республика Дагестан</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-ingushetiya/">Республика Ингушетия</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-kalmy-kiya/">Республика Калмыкия</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-kareliya/">Республика Карелия</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-kry-m/">Республика Крым</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-marij-e-l/">Республика Марий Эл</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-mordoviya/">Республика Мордовия</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-saha-yakutiya/">Республика Саха (Якутия)</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-severnaya-osetiya-alaniya/">Республика Северная Осетия-Алания</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-tatarstan/">Республика Татарстан</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-ty-va/">Республика Тыва</a></li>
            <li> <a href="http://slushano.ru/rossiya/respublika-hakasiya/">Республика Хакасия</a></li>
            <li> <a href="http://slushano.ru/rossiya/rostovskaya-oblast/">Ростовская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/ryazanskaya-oblast/">Рязанская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/samarskaya-oblast/">Самарская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/saratovskaya-oblast/">Саратовская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/sahalinskaya-oblast/">Сахалинская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/sverdlovskaya-oblast/">Свердловская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/smolenskaya-oblast/">Смоленская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/stavropol-skij-kraj/">Ставропольский край</a></li>
            <li> <a href="http://slushano.ru/rossiya/tambovskaya-oblast/">Тамбовская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/tverskaya-oblast/">Тверская область‎</a></li>
            <li> <a href="http://slushano.ru/rossiya/tomskaya-oblast/">Томская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/tul-skaya-oblast/">Тульская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/tyumenskaya-oblast/">Тюменская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/udmurtskaya-respublika/">Удмуртская Республика</a></li>
            <li> <a href="http://slushano.ru/rossiya/ul-yanovskaya-oblast/">Ульяновская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/habarovskij-kraj/">Хабаровский Край</a></li>
            <li> <a href="http://slushano.ru/rossiya/hanty-mansijskij-avtonomnomny-j-okrug/">Ханты-Мансийский автономномный округ</a></li>
            <li> <a href="http://slushano.ru/rossiya/chelyabinskaya-oblast/">Челябинская область</a></li>
            <li> <a href="http://slushano.ru/rossiya/chuvashskaya-respublika/">Чувашская Республика</a></li>
            <li> <a href="http://slushano.ru/rossiya/yaroslavskaya-oblast/">Ярославская область‎</a></li>
          </ul>
        </li>
        <li class="item-id-5">
          <a href="http://slushano.ru/belarus/"><img src="img/Belarus.png" alt="Беларусь">Беларусь</a>
          <ul>
            <li> <a href="http://slushano.ru/belarus/brestskaya-oblast/">Брестская область</a></li>
            <li> <a href="http://slushano.ru/belarus/vitebskaya-oblast/">Витебская область</a></li>
            <li> <a href="http://slushano.ru/belarus/gomel-skaya-oblast/">Гомельская область</a></li>
            <li> <a href="http://slushano.ru/belarus/grodnenskaya-oblast/">Гродненская область</a></li>
            <li> <a href="http://slushano.ru/belarus/minskaya-oblast/">Минская область</a></li>
            <li> <a href="http://slushano.ru/belarus/mogilyovskaya-oblast/">Могилёвская область</a></li>
          </ul>
        </li>
        <li class="item-id-3">
          <a href="http://slushano.ru/ukraina/"><img src="img/Ukraine.png" alt="Украина">Украина</a>
          <ul>
            <li> <a href="http://slushano.ru/ukraina/vinnitskaya-oblast/">Винницкая область</a></li>
            <li> <a href="http://slushano.ru/ukraina/voly-nskaya-oblast/">Волынская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/dnepropetrovskaya-oblast/">Днепропетровская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/donetskaya-oblast/">Донецкая область</a></li>
            <li> <a href="http://slushano.ru/ukraina/zhitomirskaya-oblast/">Житомирская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/zakarpatskaya-oblast/">Закарпатская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/zaporozhskaya-oblast/">Запорожская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/kievskaya-oblast/">Киевская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/kirovogradskaya-oblast/">Кировоградская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/luganskaya-oblast/">Луганская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/nikolaevskaya-oblast/">Николаевская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/odesskaya-oblast/">Одесская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/poltavskaya-oblast/">Полтавская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/sumskaya-oblast/">Сумская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/harkovskaya-oblast/">Харьковская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/hersonskaya-oblast/">Херсонская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/hmel-nitskaya-oblast/">Хмельницкая область</a></li>
            <li> <a href="http://slushano.ru/ukraina/cherkasskaya-oblast/">Черкасская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/chernigovskaya-oblast/">Черниговская область</a></li>
            <li> <a href="http://slushano.ru/ukraina/chernovitskaya-oblast/">Черновицкая область</a></li>
          </ul>
        </li>
        <li class="item-id-1245">
          <a href="http://slushano.ru/kazahstan/"><img src="img/Kazakhstan.png" alt="Казахстан">Казахстан</a>
          <ul>
            <li> <a href="http://slushano.ru/kazahstan/akmolinskaya-oblast/">Акмолинская область</a></li>
            <li> <a href="http://slushano.ru/kazahstan/aktyubinskaya-oblast/">Актюбинская область</a></li>
            <li> <a href="http://slushano.ru/kazahstan/almatinskaya-oblast/">Алматинская область</a></li>
            <li> <a href="http://slushano.ru/kazahstan/vostochno-kazahstanskaya-oblast/">Восточно-Казахстанская область</a></li>
            <li> <a href="http://slushano.ru/kazahstan/zapadno-kazahstanskaya-oblast/">Западно-Казахстанская область</a></li>
            <li> <a href="http://slushano.ru/kazahstan/karagandinskaya-oblast/">Карагандинская область</a></li>
            <li> <a href="http://slushano.ru/kazahstan/kostanajskaya-oblast/">Костанайская область</a></li>
            <li> <a href="http://slushano.ru/kazahstan/mangistauskaya-oblast/">Мангистауская область</a></li>
            <li> <a href="http://slushano.ru/kazahstan/pavlodarskaya-oblast/">Павлодарская область</a></li>
            <li> <a href="http://slushano.ru/kazahstan/severo-kazahstanskaya-oblast/">Северо-Казахстанская область</a></li>
            <li> <a href="http://slushano.ru/kazahstan/yuzhno-kazahstanskaya-oblast/">Южно-Казахстанская область</a></li>
          </ul>
        </li>
        <li class="item-id-232410">
          <a href="http://slushano.ru/uzbekistan/"><img src="img/Uzbekistan.png" alt="Узбекистан">Узбекистан</a>
          <ul>
            <li> <a href="http://slushano.ru/uzbekistan/tashkentskaya-oblast/">Ташкентская область</a></li>
          </ul>
        </li>
        <li class="item-id-1283">
          <a href="http://slushano.ru/pol-sha/"><img src="img/Poland.png" alt="Польша">Польша</a>
          <ul>
            <li> <a href="http://slushano.ru/pol-sha/lodzinskoe-voevodstvo/">Лодзинское воеводство</a></li>
            <li> <a href="http://slushano.ru/pol-sha/mazovetskoe-voevodstvo/">Мазовецкое воеводство</a></li>
            <li> <a href="http://slushano.ru/pol-sha/malopol-skoe-voevodstvo/">Малопольское воеводство</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="reklama ads ads-3 styled-block"></div>
  </div>

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
