type SqlActionType = 'findAll' | 'findOne' | 'insert' | 'update' | 'del'

type CategoryType = {
  id: number
  name: string
  created_at: string
}

type ContentType = {
  id: number
  title: string
  category_id: number
  content: string
  created_at: string
}
