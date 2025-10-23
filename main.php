<?php
$post = [
    'user' => ['username' => 'albert', 'avatar' => 'https://i.pravatar.cc/48?img=11'],
    'title' => 'První post',
    'content' => 'Moje první fotka!',
    'image_url' => 'https://picsum.photos/seed/d/1200/800',
    'tags' => ['krasa', 'fotka', 'srnka'],
    'likes' => 10,
    'created_at' => '2025-10-10 09:00',
    'comments' => [
        ['author' => 'John', 'content' => 'Comment'],
        ['author' => 'Jane', 'content' => 'Comment2'],
    ],
];

$post2 = [
    'user' => ['username' => 'honza', 'avatar' => 'https://i.pravatar.cc/48?img=22'],
    'title' => 'Druhý post',
    'content' => 'Moje první fotka!2',
    'image_url' => 'https://picsum.photos/seed/e/1200/800',
    'tags' => ['svetlo', 'chram'],
    'likes' => 12,
    'created_at' => '2025-10-10 10:15',
    'comments' => [
        ['author' => 'Mia', 'content' => 'Commetn'],
    ],
];

$post3 = [
    'user' => ['username' => 'jan', 'avatar' => 'https://i.pravatar.cc/48?img=33'],
    'title' => 'Třetí post',
    'content' => 'Moje první fotka!3',
    'image_url' => 'https://picsum.photos/seed/f/1200/800',
    'tags' => ['more', 'slunce'],
    'likes' => 11,
    'created_at' => '2025-10-10 11:30',
    'comments' => [],
];

$posts = [$post, $post2, $post3];
?>
<!doctype html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <title>Instagram</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root{
            --bg:#fafafa;
            --card:#ffffff;
            --text:#101114;
            --muted:#6f7785;
            --border:#e9e9ee;
            --primary:#2563eb;
            --tag-bg:#eef2ff;
            --tag-text:#3730a3;
            --shadow:0 6px 20px rgba(16,17,20,.08);
            --ring:conic-gradient(from 220deg, #ff7ab6, #ffd17a, #7ad7ff, #b07aff, #ff7ab6);
        }
        @media (prefers-color-scheme: dark){
            :root{
                --bg:#0d0f12;
                --card:#121419;
                --text:#eceef2;
                --muted:#a8b0bf;
                --border:#1d2128;
                --tag-bg:#1a2030;
                --tag-text:#c7d2fe;
                --shadow:0 8px 28px rgba(0,0,0,.35);
            }
        }
        *{box-sizing:border-box}
        html,body{height:100%}
        body{
            margin:0;
            font-family:system-ui,-apple-system,"Segoe UI",Roboto,Arial,sans-serif;
            background:var(--bg);
            color:var(--text);
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
        }
        .container-narrow{max-width:720px;margin:0 auto}
        .topbar{
            position:sticky;top:0;z-index:50;background:rgba(255,255,255,.7);
            backdrop-filter:saturate(180%) blur(14px);
            border-bottom:1px solid var(--border);
        }
        @media (prefers-color-scheme: dark){
            .topbar{background:rgba(13,15,18,.6)}
        }
        .brand{
            font-weight:800;letter-spacing:.2px;margin:0;
            padding:14px 0;text-align:center;
        }
        .wrap{padding:24px 16px 96px}
        .post{
            background:var(--card);
            border:1px solid var(--border);
            border-radius:16px;
            overflow:hidden;
            box-shadow:var(--shadow);
            transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease;
            margin:18px 0;
        }
        .post:hover{transform:translateY(-2px);box-shadow:0 10px 28px rgba(16,17,20,.12)}
        .head{
            display:flex;align-items:center;gap:12px;
            padding:12px 16px;
        }
        .avatar-wrap{
            position:relative;flex:0 0 auto;
            width:46px;height:46px;border-radius:50%;
            padding:2px;background:var(--ring);
        }
        .avatar{
            width:100%;height:100%;border-radius:50%;object-fit:cover;
            display:block;background:var(--card);
        }
        .user-block{display:flex;flex-direction:column;line-height:1.15}
        .username{font-weight:700;font-size:14.5px}
        .created{font-size:12.5px;color:var(--muted)}
        .dots{margin-left:auto;font-size:20px;color:var(--muted);transition:opacity .15s ease;opacity:.9}
        .dots:hover{opacity:1}
        .img{position:relative}
        .img img{
            display:block;width:100%;height:auto;object-fit:cover;
            aspect-ratio:4/3;
            background:linear-gradient(180deg,rgba(0,0,0,.04),transparent 30%);
        }
        @media (min-width:768px){ .img img{aspect-ratio:16/10} }
        .bar{
            display:flex;align-items:center;justify-content:space-between;
            padding:10px 14px 6px 14px;
        }
        .left{display:flex;align-items:center;gap:16px}
        .icon-btn{
            display:inline-flex;align-items:center;gap:8px;
            font-size:22px;color:var(--text);text-decoration:none;
            transform:translateZ(0);
        }
        .icon-btn small{font-weight:800;font-size:14px}
        .icon{transition:transform .12s ease, opacity .12s ease}
        .icon-btn:active .icon{transform:scale(.92)}
        .icon-btn:hover .icon{opacity:.8}
        .bookmark{font-size:22px;color:var(--text)}
        .body{padding:0 16px 14px 16px}
        .caption{margin:6px 0 4px;font-size:15px}
        .tags{display:flex;flex-wrap:wrap;gap:8px;margin:8px 0 10px}
        .tag{
            display:inline-flex;align-items:center;gap:6px;
            padding:6px 10px;border-radius:999px;
            background:var(--tag-bg);color:var(--tag-text);font-size:13px;font-weight:600
        }
        .comments{display:grid;gap:6px}
        .comment{font-size:14.5px}
        .comment b{font-weight:800}
        .divider{height:1px;background:var(--border);margin:6px 0 0}
        .touch-space{height:2px}
        .post:focus-within{border-color:rgba(37,99,235,.35);box-shadow:0 0 0 4px rgba(37,99,235,.08),var(--shadow)}
        @media (hover:none){
            .post:hover{transform:none;box-shadow:var(--shadow)}
        }
        .likepulse{position:relative}
        .likepulse .icon{transform-origin:center}
        .likepulse:active .icon{animation:pulse .25s ease}
        @keyframes pulse{
            0%{transform:scale(1)}
            50%{transform:scale(1.15)}
            100%{transform:scale(1)}
        }
    </style>
</head>
<body>
<div class="topbar">
    <div class="container-narrow">
        <h1 class="brand">Instagram</h1>
    </div>
</div>

<div class="wrap container-narrow">
    <?php foreach ($posts as $post): ?>
        <article class="post" tabindex="0">
            <div class="head">
                <div class="avatar-wrap">
                    <img class="avatar" src="<?= htmlspecialchars($post['user']['avatar'], ENT_QUOTES, 'UTF-8'); ?>" alt="avatar">
                </div>
                <div class="user-block">
                    <span class="username"><?= htmlspecialchars($post['user']['username'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <span class="created"><?= htmlspecialchars($post['created_at'], ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
                <i class="bi bi-three-dots dots" aria-label="Možnosti"></i>
            </div>

            <div class="img">
                <img src="<?= htmlspecialchars($post['image_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="foto">
            </div>

            <div class="bar">
                <div class="left">
                    <a class="icon-btn likepulse" href="#" aria-label="To se mi líbí">
                        <i class="bi bi-heart icon"></i>
                        <small><?= (int)$post['likes']; ?></small>
                    </a>
                    <a class="icon-btn" href="#" aria-label="Komentovat">
                        <i class="bi bi-chat icon"></i>
                    </a>
                    <a class="icon-btn" href="#" aria-label="Poslat">
                        <i class="bi bi-send icon"></i>
                    </a>
                </div>
                <a class="bookmark" href="#" aria-label="Uložit">
                    <i class="bi bi-bookmark icon"></i>
                </a>
            </div>

            <div class="body">
                <p class="caption">
                    <b><?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>:</b>
                    <?= htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <?php if (isset($post['tags']) && count($post['tags']) > 0): ?>
                    <div class="tags">
                        <?php foreach ($post['tags'] as $t): ?>
                            <?php $hash = '#' . str_replace(' ', '', $t); ?>
                            <span class="tag"><?= htmlspecialchars($hash, ENT_QUOTES, 'UTF-8'); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($post['comments']) && count($post['comments']) > 0): ?>
                    <div class="comments">
                        <?php foreach ($post['comments'] as $c): ?>
                            <p class="comment">
                                <b><?= htmlspecialchars($c['author'], ENT_QUOTES, 'UTF-8'); ?></b>
                                <?= htmlspecialchars($c['content'], ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="comment"><em>No comments.</em></p>
                <?php endif; ?>
            </div>

            <div class="divider"></div>
            <div class="touch-space"></div>
        </article>
    <?php endforeach; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
