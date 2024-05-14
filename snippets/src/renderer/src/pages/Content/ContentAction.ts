export default async ({ request, params }) => {
  const data = await request.formData()
  const res = await window.api.sql(
    `update contents set title=@title,content=@content where id=@id`,
    'update',
    {
      title: data.get('title'),
      content: data.get('content'),
      id: params.id
    }
  )
  return res
}
