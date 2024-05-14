export default async () => {
  return window.api.sql('select * from categories ', 'findAll')
}
