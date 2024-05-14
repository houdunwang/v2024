import { Form, useLoaderData, useSubmit } from 'react-router-dom'
import './content.scss'
import { Button } from 'antd'
export const Content = () => {
  const submit = useSubmit()
  const content = useLoaderData() as ContentType
  return (
    <Form method="PUT">
      <main className="content-page" key={content.id}>
        {/* <h1>{content.title}</h1> */}
        <input
          name="title"
          defaultValue={content.title}
          onChange={(e) => {
            // console.log(34)
            submit(e.target.form)
          }}
        />
        {/* <div className="content">{content.content}</div> */}
        <textarea
          name="content"
          defaultValue={content.content}
          onChange={(e) => submit(e.target.form)}
        />
        {/* <div className="border-t flex items-center justify-center">
          <button>保存</button> */}
        {/* <Button type="default" size="small" >
            保存
          </Button> */}
        {/* </div> */}
      </main>
    </Form>
  )
}
