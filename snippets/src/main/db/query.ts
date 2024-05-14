import { db } from '../db/connect'

export const findAll = (sql: string) => {
  return db.prepare(sql).all()
}

export const findOne = (sql: string) => {
  return db.prepare(sql).get()
}

export const insert = (sql: string) => {
  return db.prepare(sql).run().lastInsertRowid
}

export const update = (sql: string, params: Record<string, any>) => {
  return db.prepare(sql).run(params).changes
}

export const del = (sql: string) => {
  return db.prepare(sql).run().changes
}
