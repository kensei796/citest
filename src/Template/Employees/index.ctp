<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<?= $this->Html->css('top_page.css'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>マイページ</title>
</head>
<body>
    <header>
    <div class="head">
        <h1 class="headline">ShareRee</h1>
        <h5 class="headlines">ロマンを与えるものによるブックサイト</h5>
            <div class="login">
                <ul class="nav-list">
                    <li class="nav-list-item">ようこそ<?= $employees->name; ?>さん</li>
                    <li class="nav-list-item">ログアウト</li>
                </ul>
            </div>
    </div>
    </header>
    <br>
                <img src="img/IMG_633.jpg"　alt="トップ画像">
                <p>ユーザー名:<?= $employees->name; ?></p>

                <p>所属部署:<?= $employees->department->department_name; ?></p>
                <p>勤務地:<?= $employees->location->location_name; ?></p>
</body>
</html>