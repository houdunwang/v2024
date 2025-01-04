import { Pagination, PaginationContent, PaginationItem, PaginationLink } from '@/components/ui/pagination'
import { IPaginate } from '@/types/paginate'
import classNames from 'classnames'

export const Paginate = ({ meta }: { meta: IPaginate<[]>['meta'] }) => {
	return (
		<Pagination>
			<PaginationContent>
				{meta.links.map((link, index) => (
					<PaginationItem key={index}>
						<PaginationLink href={link.url ? link.url : '#'} isActive={link.active} size={'default'}
							className={classNames({
								'bg-gray-50 border': !link.active,
								'bg-primary text-white': link.active
							}, 'hover:bg-gray-600 hover:text-white')}
							dangerouslySetInnerHTML={{ __html: link.label.replace(/&laquo;|&raquo;/, '') }}>
						</PaginationLink>
					</PaginationItem>
				))}
			</PaginationContent>
		</Pagination>
	)
}
