import React from 'react';
import { DownOutlined, SmileOutlined } from '@ant-design/icons';
import type { MenuProps } from 'antd';
import { Dropdown, Space } from 'antd';
import { Avatar } from 'antd';

const items: MenuProps['items'] = [
	{
		key: '1',
		label: (
			<a target="_blank" rel="noopener noreferrer" href="https://www.antgroup.com">
				1st menu item
			</a>
		),
	},
	{
		key: '2',
		label: (
			<a target="_blank" rel="noopener noreferrer" href="https://www.aliyun.com">
				2nd menu item (disabled)
			</a>
		),
		disabled: true,
	},
	{
		key: '3',
		label: (
			<a target="_blank" rel="noopener noreferrer" href="https://www.luohanacademy.com">
				3rd menu item (disabled)
			</a>
		),
		disabled: true,
	},
	{
		key: '4',
		danger: true,
		label: 'a danger item',
	},
];

const UserDropMenu: React.FC = () => (
	<Dropdown menu={{ items }}>
		<Avatar icon={<img src="/images/xj.jpg" />} size={35} />
	</Dropdown>
);

export default UserDropMenu;