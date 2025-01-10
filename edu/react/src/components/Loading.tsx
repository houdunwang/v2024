import { Spin } from 'antd';
import classNames from 'classnames';
import { FC } from 'react';

export const Loading: FC<{ className?: string }> = ({ className }) => {

	return <div className={classNames('flex justify-center items-center py-16', className)}>
		<Spin />
	</div>
}