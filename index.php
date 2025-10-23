<?php
function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

$post = [
        'user' => [
                'username' => 'albert',
                'avatar' => 'https://i.pravatar.cc/48?img=11'],
                'title' => 'První post',
                'content' => 'Moje první fotka!',
                'image_url' => 'https://picsum.photos/seed/d/1200/800',
                'tags' => ['krasa', 'fotka', 'srnka'],
                'likes' => 10,
                'created_at' => '2025-10-10 09:00',
                'comments' => [
                        ['author' => 'John', 'content' => 'Comment'],
                        ['author' => 'Jane', 'content' => 'Comment2']
                ]
];
$post2 = [
        'user' => [
                'username' => 'honza',
                'avatar' => 'https://i.pravatar.cc/48?img=22'],
                'title' => 'Druhý post',
                'content' => 'Moje první fotka!2',
                'image_url' => 'https://picsum.photos/seed/e/1200/800',
                'tags' => ['svetlo', 'chram'],
                'likes' => 12,
                'created_at' => '2025-10-10 10:15',
                'comments' => [
                        ['author' => 'Mia', 'content' => 'Commetn']
                ]
];
$post3 = [
        'user' => [
                'username' => 'jan',
                'avatar' => 'https://i.pravatar.cc/48?img=33'],
                'title' => 'Třetí post',
                'content' => 'Moje první fotka!3',
                'image_url' => 'https://picsum.photos/seed/f/1200/800',
                'tags' => ['more', 'slunce'],
                'likes' => 11,
                'created_at' => '2025-10-10 11:30',
                'comments' => []
];
$posts = [$post, $post2, $post3];

$suggested = [
        ['username' => 'sofia',
                'avatar' => 'https://i.pravatar.cc/48?img=5',
                'reason' => 'Nový na IG'],
        ['username' => 'michal',
                'avatar' => 'https://i.pravatar.cc/48?img=14',
                'reason' => 'Sleduje vás'],
        ['username' => 'nina',
                'avatar' => 'https://i.pravatar.cc/48?img=47',
                'reason' => 'Doporučeno pro vás'],
];
$currentUser = ['username' => 'moje_jmeno',
                'avatar' => 'https://i.pravatar.cc/48?img=1'];
?>
<!doctype html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <title>Instagram layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --border: #dbdbdb;
            --bg: #fafafa;
            --card: #fff;
            --col-left: 244px;
            --col-center: 680px;
            --col-right: 320px;
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
            background: var(--bg);
            color: #111
        }

        .app {
            display: flex;
            min-height: 100dvh
        }

        .sidebar-left {
            position: sticky;
            top: 0;
            align-self: flex-start;
            width: var(--col-left);
            border-right: 1px solid var(--border);
            background: #fff;
            min-height: 100dvh;
            padding: 16px 12px;
        }

        .brand {
            font-weight: 700;
            margin: 12px 8px 20px;
        }

        .nav-ig .item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 10px;
            cursor: pointer
        }

        .nav-ig .item:hover {
            background: #f5f5f5
        }

        .nav-ig i {
            font-size: 22px;
            width: 26px;
            text-align: center
        }

        .main {
            flex: 1;
            display: flex;
            justify-content: center;
            gap: 24px;
            padding: 24px
        }

        .feed {
            width: var(--col-center);
        }

        .sidebar-right {
            position: sticky;
            top: 24px;
            align-self: flex-start;
            width: var(--col-right)
        }

        .post {
            background: var(--card);
            border: 1px solid var(--border);
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
            border: 1px solid var(--border)
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
            height: auto
        }

        .bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px
        }

        .bar .left {
            display: flex;
            gap: 16px
        }

        .bar i {
            cursor: pointer
        }

        .bar i:hover {
            opacity: .8
        }

        .body {
            padding: 0 12px 12px
        }

        .tag {
            margin-right: 6px;
            text-decoration: none;
            color: inherit
        }

        .comment {
            margin-bottom: 6px
        }

        .card-right {
            background: transparent;
            border: none
        }

        .me-box {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px
        }

        .me-box img {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid var(--border)
        }

        .sugg h6 {
            font-size: 14px;
            color: #777;
            margin: 12px 0
        }

        .sugg-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px
        }

        .sugg-item .left {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .sugg-item img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid var(--border)
        }

        .btn-follow {
            font-weight: 600;
            font-size: 14px
        }
    </style>
</head>
<body>
<div class="app">
    <aside class="sidebar-left">
        <div class="brand">Instagram</div>
        <nav class="nav-ig">
            <div class="item"><i class="bi bi-house-door"></i><span class="label">Domů</span></div>
            <div class="item"><i class="bi bi-search"></i><span class="label">Hledat</span></div>
            <div class="item"><i class="bi bi-compass"></i><span class="label">Prozkoumat</span></div>
            <div class="item"><i class="bi bi-camera-video"></i><span class="label">Reels</span></div>
            <div class="item"><i class="bi bi-chat-dots"></i><span class="label">Zprávy</span></div>
            <div class="item"><i class="bi bi-heart"></i><span class="label">Aktivity</span></div>
            <div class="item"><i class="bi bi-plus-square"></i><span class="label">Vytvořit</span></div>
            <div class="item">
                <img src="<?= e($currentUser['avatar']) ?>" alt=""
                     style="width:26px;height:26px;border-radius:50%;border:1px solid var(--border)">
                <span class="label">Profil</span>
            </div>
            <hr>
            <div class="item"><i class="bi bi-list"></i><span class="label">Další</span></div>
        </nav>
    </aside>
    <div class="main">
        <main class="feed">
            <?php foreach ($posts as $item): ?>
                <article class="post">
                    <div class="head">
                        <img class="avatar" src="<?= e($item['user']['avatar']) ?>"
                             alt="Profilová fotka uživatele <?= e($item['user']['username']) ?>">
                        <div>
                            <div class="username"><?= e($item['user']['username']) ?></div>
                            <time class="created"
                                  datetime="<?= e(str_replace(' ', 'T', $item['created_at'])) ?>"><?= e($item['created_at']) ?></time>
                        </div>
                        <i class="bi bi-three-dots ms-auto" aria-label="Možnosti"></i>
                    </div>

                    <div class="img">
                        <img src="<?= e($item['image_url']) ?>" alt="<?= e($item['title']) ?>">
                    </div>

                    <div class="bar">
                        <div class="left">
                            <div class="likebox d-flex align-items-center gap-2">
                                <i class="bi bi-heart fs-4" aria-label="Lajk"></i>
                                <span class="like-count"><?= (int)$item['likes'] ?></span>
                            </div>
                            <i class="bi bi-chat fs-4" aria-label="Komentáře"></i>
                            <i class="bi bi-send fs-4" aria-label="Sdílet"></i>
                        </div>
                        <i class="bi bi-bookmark fs-4" aria-label="Uložit"></i>
                    </div>

                    <div class="body">
                        <p class="caption">
                            <b><?= e($item['title']) ?>:</b> <?= e($item['content']) ?>
                        </p>

                        <?php if (!empty($item['tags'])): ?>
                            <p class="tags">
                                <?php foreach ($item['tags'] as $t): $hash = '#' . preg_replace('/\s+/', '', $t); ?>
                                    <span class="tag"><?= e($hash) ?></span>
                                <?php endforeach; ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($item['comments'])): ?>
                            <?php foreach ($item['comments'] as $c): ?>
                                <p class="comment"><b><?= e($c['author']) ?>:</b> <?= e($c['content']) ?></p>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="comment"><em>No comments.</em></p>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>

        <aside class="sidebar-right">
            <div class="card card-right">
                <div class="card-body">
                    <div class="me-box">
                        <img src="<?= e($currentUser['avatar']) ?>" alt="Můj profil">
                        <div class="small">
                            <div class="fw-semibold"><?= e($currentUser['username']) ?></div>
                            <div class="text-muted">Vítej zpět</div>
                        </div>
                        <a href="#" class="ms-auto text-decoration-none small fw-semibold">Přepnout</a>
                    </div>

                    <div class="sugg">
                        <h6>Tipy pro vás</h6>
                        <?php foreach ($suggested as $s): ?>
                            <div class="sugg-item">
                                <div class="left">
                                    <img src="<?= e($s['avatar']) ?>" alt="Profil: <?= e($s['username']) ?>">
                                    <div class="small">
                                        <div class="fw-semibold"><?= e($s['username']) ?></div>
                                        <div class="text-muted"><?= e($s['reason']) ?></div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-link btn-sm text-decoration-none btn-follow">Sledovat</a>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-3 small text-muted">
                        © <?= date('Y') ?> Instagram Clone • Podmínky • Zásady • O nás
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
