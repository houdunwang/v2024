export default async ({ request }) => {
  const formData = await request.formData()
  const data = Object.fromEntries(formData)
  const isRegister = await window.api.shortCut(data.shortCut)
  if (isRegister) {
    return window.api.sql(`update config set content=@content where id=1`, 'update', {
      content: JSON.stringify(data)
    })
  }
  return {}
}
