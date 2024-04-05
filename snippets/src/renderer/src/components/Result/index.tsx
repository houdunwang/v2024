import useCodeSelect from '@renderer/hooks/useCodeSelect'
import classNames from 'classnames'
import './styles.scss'

export default function Result() {
  const { data, id, selectItem } = useCodeSelect()

  return (
    <main className="result">
      {data.map((item) => (
        <div
          key={item.id}
          className={classNames({ active: item.id == id })}
          onClick={() => selectItem(item.id)}
        >
          {item.content}
        </div>
      ))}
    </main>
  )
}
