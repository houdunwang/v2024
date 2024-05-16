export default async ({ request }) => {
  const formData = await request.formData()
  const data = Object.fromEntries(formData)
  switch (request.method) {
    case 'POST': {
      return window.api.sql(
        `insert into categories (name,created_at) values('未命名',datetime())`,
        'insert'
      )
    }
    case 'DELETE': {
      return window.api.sql(`delete from categories where id=@id`, 'del', {
        id: data.id
      })
    }
  }

  return {}
}
