<div style="padding: 3px;width: 400px;border: 1px solid black;position: absolute;top: 50px;right: 50px;">
    <b>Can i interest you in some stats?</b><br />
    Inloggad?: <pre><?var_dump(isset($_SESSION['user']) && $_SESSION['user']->logged_in());?></pre>
   	Admin?: <pre><?var_dump(isset($_SESSION['user']) && $_SESSION['user']->isAdmin());?></pre>
    Time it took to run: <?=round((microtime(true)-KOHANA_START_TIME),5); ?>s<br />
    Number of DB-queries: <?=Database::instance()->get_num_queries(); ?><br />
    <pre><?php echo implode("\r\n", Database::instance()->queries); ?></pre>
    What's the session like?:
    <pre><?=var_dump(Session::instance()); ?></pre>
</div>