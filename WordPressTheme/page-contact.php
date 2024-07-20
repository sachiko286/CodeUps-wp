<?php get_header(); ?>
<main>

  <section class="sub-fv sub-fv--contact">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title sub-fv__title--contact">Contact</h2>
  </section>


  <div class="breadcrumb">
    <div class="breadcrumb__inner inner">
      <ol class="breadcrumb__list">
        <li class="breadcrumb__list-item"><a href="/">TOP</a></li>
        <li class="breadcrumb__list-item"><a href="/category">お問い合わせ</a></li>
      </ol>
    </div>
  </div>

  <div class="page-contact top-page-contact">
    <div class="page-contact__inner inner">
      <form class="page-contact__form form" id="form" action="#">
        <div class="form__error">※必須項目が入力されていません。入力してください。</div>
        <dl class="form__wrap">
          <dt class="form__label">お名前<span>必須</span></dt>
          <dd class="form__input">
            <input type="text" id="name" placeholder="沖縄 太郎" required>
          </dd>
        </dl>
        <dl class="form__wrap">
          <dt class="form__label">メールアドレス<span>必須</span></dt>
          <dd class="form__input">
            <input type="email" id="mail" placeholder="aaa000@ggmail.com">
          </dd>
        </dl>
        <dl class="form__wrap">
          <dt class="form__label">電話番号<span>必須</span></dt>
          <dd class="form__input">
            <input type="tel" id="phone" placeholder="000-0000-0000" required>
          </dd>
        </dl>
        <dl class="form__wrap">
          <dt class="form__label">お問合せ項目<span>必須</span></dt>
          <dd class="form__checkbox">
            <label><input type="checkbox" name="category" value="ダイビング講習について"><span>ダイビング講習について</span></label>
            <label><input type="checkbox" name="category" value="ファンデイビングについて"><span>ファンデイビングについて</span></label>
            <label><input type="checkbox" name="category" value="体験ダイビングについて"><span>体験ダイビングについて</span></label>
          </dd>
        </dl>

        <dl class="form__wrap">
          <dt class="form__label">キャンペーン</dt>
          <dd class="form__select">
            <select id="pref">
              <option hidden>キャンペーン内容を選択</option>
              <option value="ライセンス取得">ライセンス取得</option>
              <option value="貸切体験ダイビング">貸切体験ダイビング</option>
              <option value="ナイトダイビング">ナイトダイビング</option>
              <option value="貸切ファンダイビング">貸切ファンダイビング</option>
            </select>
          </dd>
        </dl>
        <dl class="form__wrap form__wrap--textarea">
          <dt class="form__label">お問合せ内容<span>必須</span></dt>
          <dd class="form__textarea">
            <textarea name="message" required></textarea>
          </dd>
        </dl>
        <div class="form__privacyCheck">
          <div class="form__privacyCheck-wrapper">
            <label><input type="checkbox" name="privacyCheck" id="privacyCheck" required value="個人情報"><span>個人情報の取り扱いについて同意のうえ送信します。</span></label>
          </div>
        </div>
        <div class="form__button">
          <button class="button slide" type="submit" id="js-submit">Send<span class="button__arrow button__arrow--contact"></span>
          </button>
        </div>
      </form>
    </div>
  </div>
</main>
<?php get_footer(); ?>