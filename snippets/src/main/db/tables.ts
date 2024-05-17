import { db } from './connect'
import { Random } from 'mockjs'
import { findOne } from './query'
import { is } from '@electron-toolkit/utils'

db.exec(`
  create table if not exists categories (
    id integer primary key autoincrement not null,
    name text not null,
    created_at text not null
  );
`)

db.exec(`
  create table if not exists contents (
    id integer primary key autoincrement not null,
    title text not null,
    content text not null,
    category_id integer,
    created_at text not null
  );
`)

function initData() {
  const isInit = findOne('select * from contents')
  if (isInit) return
  for (let i = 1; i <= 10; i++) {
    const name = Random.title(5, 10)
    db.exec(`
    INSERT INTO categories (name,created_at) VALUES('${name}',datetime());
  `)
    for (let j = 1; j < 20; j++) {
      const title = Random.title(5, 10)
      const content = Random.paragraph(5, 10)
      db.exec(`
    INSERT INTO contents (title,content,category_id,created_at) VALUES('${title}','${content}',${i},datetime());
  `)
    }
  }
}

initData()
