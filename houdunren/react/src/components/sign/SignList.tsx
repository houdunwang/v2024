import React from 'react'
import { Card, Space, Table, Tag } from 'antd'
import type { TableProps } from 'antd'

interface DataType {
  key: string
  name: string
  age: number
  address: string
  tags: string[]
}

const columns: TableProps<DataType>['columns'] = [
  {
    title: '签到的朋友',
    dataIndex: 'name',
    key: 'name',
    render: (text) => <a>{text}</a>,
  },
  {
    title: '签到时间',
    dataIndex: 'age',
    key: 'age',
  },
  {
    title: '月签到天数',
    dataIndex: 'address',
    key: 'address',
  },
  {
    title: '总签到天数',
    key: 'tags',
    dataIndex: 'tags',
    render: (_, { tags }) => (
      <>
        {tags.map((tag) => {
          let color = tag.length > 5 ? 'geekblue' : 'green'
          if (tag === 'loser') {
            color = 'volcano'
          }
          return (
            <Tag color={color} key={tag}>
              {tag.toUpperCase()}
            </Tag>
          )
        })}
      </>
    ),
  },
  {
    title: '签到心情',
    key: 'action',
    render: (_, record) => (
      <Space size='middle'>
        <a>Invite {record.name}</a>
        <a>Delete</a>
      </Space>
    ),
  },
]

const data: DataType[] = [
  {
    key: '1',
    name: 'John Brown',
    age: 32,
    address: 'New York No. 1 Lake Park',
    tags: ['nice', 'developer'],
  },
  {
    key: '2',
    name: 'Jim Green',
    age: 42,
    address: 'London No. 1 Lake Park',
    tags: ['loser'],
  },
  {
    key: '3',
    name: 'Joe Black',
    age: 32,
    address: 'Sydney No. 1 Lake Park',
    tags: ['cool', 'teacher'],
  },
]

const SignList: React.FC = () => (
  <Card title='日签到排行' className='mt-3'>
    <Table
      columns={columns}
      dataSource={data}
      pagination={false}
      bordered
      scroll={{ x: 1000 }}
    />
  </Card>
)

export default SignList
