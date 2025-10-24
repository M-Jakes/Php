<?php
$posts = [
        [
                'user' => ['username' => 'albert',
                        'avatar' => 'https://i.pravatar.cc/48?img=11'],
                'title' => 'První post',
                'content' => 'Moje první fotka!',
                'image_url' => 'https://picsum.photos/seed/d/1200/800',
                'tags' => ['krasa', 'fotka', 'srnka'],
                'likes' => 10, 'created_at' => '2025-10-10 09:00',
                'comments' => [['author' => 'John', 'content' => 'Comment'],
                        ['author' => 'Jane', 'content' => 'Comment2']]
        ],
        [
                'user' => ['username' => 'honza',
                        'avatar' => 'https://i.pravatar.cc/48?img=22'],
                'title' => 'Druhý post',
                'content' => 'Moje první fotka!2',
                'image_url' => 'https://picsum.photos/seed/e/1200/800',
                'tags' => ['svetlo', 'chram'],
                'likes' => 12, 'created_at' => '2025-10-10 10:15',
                'comments' => [['author' => 'Mia', 'content' => 'Commetn']]
        ],
        [
                'user' => ['username' => 'jan',
                        'avatar' => 'https://i.pravatar.cc/48?img=33'],
                'title' => 'Třetí post',
                'content' => 'Moje první fotka!3',
                'image_url' => 'https://picsum.photos/seed/f/1200/800',
                'tags' => ['more', 'slunce'],
                'likes' => 11, 'created_at' => '2025-10-10 11:30', 'comments' => []
        ],
];

$suggested = [
        ['username' => 'sofia', 'avatar' => 'https://i.pravatar.cc/48?img=5', 'reason' => 'Nový na IG'],
        ['username' => 'michal', 'avatar' => 'https://i.pravatar.cc/48?img=14', 'reason' => 'Sleduje vás'],
        ['username' => 'nina', 'avatar' => 'https://i.pravatar.cc/48?img=47', 'reason' => 'Doporučeno pro vás'],
];

$currentUser = ['username' => 'moje_jmeno', 'avatar' => 'https://i.pravatar.cc/48?img=1'];
?>
<!doctype html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <title>Instagram – čistá verze</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: system-ui, Arial, sans-serif;
            background: #fafafa;
            color: #111
        }

        .app {
            display: flex;
            min-height: 100vh
        }

        .sidebar-left {
            width: 280px;
            border-right: 1px solid #dbdbdb;
            background: #fff;
            padding: 16px
        }

        .main {
            display: flex;
            gap: 32px;
            padding: 24px;
            margin-left: 100px;
        }

        .feed {
            width: 820px
        }

        .sidebar-right {
            width: 360px;
            padding-left: 12px
        }

        .post {
            background: #fff;
            border: 1px solid #dbdbdb;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 18px
        }

        .head {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid #dbdbdb
        }

        .username {
            font-weight: 600
        }

        .created {
            font-size: 12px;
            color: #777
        }

        .img img {
            display: block;
            width: 100%;
        }

        .bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px
        }

        .bar .left {
            display: flex;
            gap: 16px;
            align-items: center
        }

        .body {
            padding: 0 12px 12px
        }

        .tag {
            margin-right: 6px
        }
        .muted {
            color: #777;
            font-size: 13px
        }
        .small {
            font-size: 14px
        }
    </style>
</head>
<body>
<div class="app">
    <aside class="sidebar-left">
        <div style="font-weight:700;margin-bottom:16px">Instagram</div>
        <nav>
            <div style="display:flex;align-items:center;gap:30px;padding:8px"><i class="bi bi-house-door"></i><span>Domů</span></div>

            <div style="display:flex;align-items:center;gap:30px;padding:8px"><i class="bi bi-search"></i><span>Hledat</span></div>

            <div style="display:flex;align-items:center;gap:30px;padding:8px"><i class="bi bi-compass"></i><span>Objevujte</span></div>

            <div style="display:flex;align-items:center;gap:30px;padding:8px"><i class="bi bi-camera-video"></i><span>Reels</span></div>

            <div style="display:flex;align-items:center;gap:30px;padding:8px"><i class="bi bi-send"></i><span>Zprávy</span></div>

            <div style="display:flex;align-items:center;gap:30px;padding:8px"><i class="bi bi-heart"></i><span>Upozornění</span></div>

            <div style="display:flex;align-items:center;gap:30px;padding:8px"><i class="bi bi-plus"></i><span>Vytvořit</span></div>

        </nav>
    </aside>

    <div class="main">
        <main class="feed">
            <?php foreach ($posts as $item): ?>
                <article class="post">
                    <div class="head">
                        <img class="avatar" src="<?= $item['user']['avatar'] ?>"
                             alt="Profil: <?= $item['user']['username'] ?>">
                        <div>
                            <div class="username"><?= $item['user']['username'] ?></div>
                            <div class="created"><?= $item['created_at'] ?></div>
                        </div>
                        <i class="bi bi-three-dots" style="margin-left:auto"></i>
                    </div>

                    <div class="img">
                        <img src="<?= $item['image_url'] ?>" alt="<?= $item['title'] ?>">
                    </div>

                    <div class="bar">
                        <div class="left">
                            <div style="display:flex;align-items:center;gap:6px"><i
                                        class="bi bi-heart"></i><span><?= $item['likes'] ?></span></div>
                            <i class="bi bi-chat"></i>
                            <i class="bi bi-send"></i>
                        </div>
                        <i class="bi bi-bookmark"></i>
                    </div>

                    <div class="body">
                        <p><b><?= $item['title'] ?>:</b> <?= $item['content'] ?></p>

                        <?php if (!empty($item['tags'])): ?>
                            <p>
                                <?php foreach ($item['tags'] as $t): $hash = '#' . preg_replace('/\s+/', '', $t); ?>
                                    <span class="tag"><?= $hash ?></span>
                                <?php endforeach; ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($item['comments'])): ?>
                            <?php foreach ($item['comments'] as $c): ?>
                                <p class="small"><b><?= $c['author'] ?>:</b> <?= $c['content'] ?></p>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="small muted"><em>No comments.</em></p>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>

        <aside class="sidebar-right">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:12px">
                <img src="<?= $currentUser['avatar'] ?>" alt="Můj profil"
                     style="width:56px;height:56px;border-radius:50%;object-fit:cover;border:1px solid #dbdbdb">
                <div>
                    <div style="font-weight:600"><?= $currentUser['username'] ?></div>
                    <div class="muted">Vítej zpět</div>
                </div>
            </div>

            <div style="margin-top:12px">
                <div class="muted" style="margin-bottom:8px">Tipy pro vás</div>
                <?php foreach ($suggested as $s): ?>
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px">
                        <div style="display:flex;align-items:center;gap:10px">
                            <img src="<?= $s['avatar'] ?>" alt="<?= $s['username'] ?>"
                                 style="width:40px;height:40px;border-radius:50%;object-fit:cover;border:1px solid #dbdbdb">
                            <div>
                                <div style="font-weight:600"><?= $s['username'] ?></div>
                                <div class="muted"><?= $s['reason'] ?></div>
                            </div>
                        </div>
                        <a href="#" style="text-decoration:none;font-weight:600">Sledovat</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="muted" style="margin-top:16px">© <?= date('Y') ?> Instagram Clone</div>
        </aside>
    </div>
</div>
</body>
</html>
