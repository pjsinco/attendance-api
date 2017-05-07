select
  sum(attendance), 
  strftime('%m', date_time, 'unixepoch', 'localtime') as month
from games
where 
  month = '04'
  and strftime('%y', date_time, 'unixepoch', 'localtime') = '2017'
  and home = 'kca'
group by month

select
  home,
  sum(attendance), 
  strftime('%Y', date_time, 'unixepoch', 'localtime') as year
from games
where 
  year = '2017'
group by home


select
from games
where

http://gd2.mlb.com/components/game/mlb/year_2016/month_04/day_05/gid_2016_04_05_bosmlb_clemlb_1/

sqlite3 -csv games.db "select home, sum(attendance), strftime('%Y', date_time, 'unixepoch', 'localtime') as year from games where year = '2017' group by home"


sqlite3 -csv games.db "select * from games" > games-`date +%Y-%m-%d`.csv

sqlite3 -csv /var/www/html/mlb-attendance/games.db "select * from games" > /var/www/html/attendance-api/database/data/games.csv



scp root@andthatproveswhat.com:/var/www/html/mlb-attendance/games-2017-05-02.csv database/data/


/usr/bin/sqlite3 -csv /var/www/html/mlb-attendance/games.db "select * from games" > /var/www/html/attendance-api/database/data/games.csv 

'2017/05/02/arimlb-wasmlb-1'

App\Game::selectRaw("home, sum(attendance), strftime('%Y', date_time, 'unixepoch', 'localtime') as year from games where year = '2017' group by home")->get()

DB::table('games')->select(DB::raw("home, sum(attendance), strftime('%Y', date_time, 'unixepoch', 'localtime') as year"))->where(DB::raw("year = '2017'"))->get()


DB::table('games')->select(DB::raw("sum(attendance), strftime('%Y', date_time, 'unixepoch', 'localtime') as year"))->groupBy('year')->get();

DB::table('games')->select('home', 'attendance')->get()->sum('attendance');
