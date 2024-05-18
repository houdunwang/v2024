import { Form, useLoaderData, useSubmit } from 'react-router-dom'
import './styles.scss'
import { useState } from 'react'
export const Setting = () => {
  const config = useLoaderData() as ConfigDataType
  const submit = useSubmit()
  const [keys, setKeys] = useState<string[]>([])
  return (
    <Form method="POST">
      <main className="setting-page">
        <h1>软件配置</h1>
        <section>
          <h5>快捷键定义</h5>
          <input
            type="text"
            name="shortCut"
            readOnly
            defaultValue={config.shortCut}
            onKeyDown={(e) => {
              if (e.metaKey || e.ctrlKey || e.altKey) {
                keys.push(e.code.replace(/Left|Right|Key|Digit/, ''))
                setKeys(keys)
                e.currentTarget.value = keys.join('+')
              }
            }}
            onKeyUp={(e) => {
              setKeys([])
              submit(e.currentTarget.form, { method: 'POST' })
            }}
          />
        </section>
        <section>
          <h5>数据库</h5>
          <input type="text" name="databaseDirectory" defaultValue={config.databaseDirectory} />
        </section>
        {/* <Button type="default" htmlType="submit">
          保存
        </Button> */}
      </main>
    </Form>
  )
}
