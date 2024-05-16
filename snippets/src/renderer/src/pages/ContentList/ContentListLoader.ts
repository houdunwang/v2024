export default async ({ params, request }) => {
  const url = new URL(request.url)
  const searchWord = url.searchParams.get('searchWord')
  const { cid } = params
  let sql = `select * from contents `
  if (searchWord) {
    sql += ` where title like @searchWord order by id desc`
    return window.api.sql(sql, 'findAll', { searchWord: `%${searchWord}%` })
  }

  if (cid !== undefined) {
    sql += `where category_id=${cid}`
  }

  sql += ' order by id desc'
  return window.api.sql(sql, 'findAll')
}
