drop table if exists userinfo;
create table userinfo (
  user_id integer primary key autoincrement,
  username text not null,
  password text not null,
  status integer not null
);
drop table if exists tokens;
create table tokens (
  user_id integer,
  token text not null,
  permission text not null,
  expiration integer not null
);
