/* eslint-disable */

// @ts-nocheck

// noinspection JSUnusedGlobalSymbols

// This file was automatically generated by TanStack Router.
// You should NOT make any changes in this file as it will be overwritten.
// Additionally, you should also exclude this file from your linter and/or formatter to prevent it from being checked or modified.

// Import Routes

import { Route as rootRoute } from './pages/__root'
import { Route as AuthRouteImport } from './pages/auth/route'
import { Route as FrontRouteImport } from './pages/_front/route'
import { Route as IndexImport } from './pages/index'
import { Route as AuthLoginImport } from './pages/auth/login'
import { Route as FrontVideoIndexImport } from './pages/_front/video/index'
import { Route as FrontTopicIndexImport } from './pages/_front/topic/index'
import { Route as FrontChapterIndexImport } from './pages/_front/chapter/index'
import { Route as FrontTopicCreateImport } from './pages/_front/topic/create'
import { Route as FrontTopicIdImport } from './pages/_front/topic/$id'
import { Route as FrontLessonSystemImport } from './pages/_front/lesson/system'
import { Route as FrontLessonProjectImport } from './pages/_front/lesson/project'
import { Route as FrontLessonIdImport } from './pages/_front/lesson/$id'
import { Route as FrontChapterIdImport } from './pages/_front/chapter/$id'

// Create/Update Routes

const AuthRouteRoute = AuthRouteImport.update({
  id: '/auth',
  path: '/auth',
  getParentRoute: () => rootRoute,
} as any)

const FrontRouteRoute = FrontRouteImport.update({
  id: '/_front',
  getParentRoute: () => rootRoute,
} as any)

const IndexRoute = IndexImport.update({
  id: '/',
  path: '/',
  getParentRoute: () => rootRoute,
} as any)

const AuthLoginRoute = AuthLoginImport.update({
  id: '/login',
  path: '/login',
  getParentRoute: () => AuthRouteRoute,
} as any)

const FrontVideoIndexRoute = FrontVideoIndexImport.update({
  id: '/video/',
  path: '/video/',
  getParentRoute: () => FrontRouteRoute,
} as any)

const FrontTopicIndexRoute = FrontTopicIndexImport.update({
  id: '/topic/',
  path: '/topic/',
  getParentRoute: () => FrontRouteRoute,
} as any)

const FrontChapterIndexRoute = FrontChapterIndexImport.update({
  id: '/chapter/',
  path: '/chapter/',
  getParentRoute: () => FrontRouteRoute,
} as any)

const FrontTopicCreateRoute = FrontTopicCreateImport.update({
  id: '/topic/create',
  path: '/topic/create',
  getParentRoute: () => FrontRouteRoute,
} as any)

const FrontTopicIdRoute = FrontTopicIdImport.update({
  id: '/topic/$id',
  path: '/topic/$id',
  getParentRoute: () => FrontRouteRoute,
} as any)

const FrontLessonSystemRoute = FrontLessonSystemImport.update({
  id: '/lesson/system',
  path: '/lesson/system',
  getParentRoute: () => FrontRouteRoute,
} as any)

const FrontLessonProjectRoute = FrontLessonProjectImport.update({
  id: '/lesson/project',
  path: '/lesson/project',
  getParentRoute: () => FrontRouteRoute,
} as any)

const FrontLessonIdRoute = FrontLessonIdImport.update({
  id: '/lesson/$id',
  path: '/lesson/$id',
  getParentRoute: () => FrontRouteRoute,
} as any)

const FrontChapterIdRoute = FrontChapterIdImport.update({
  id: '/chapter/$id',
  path: '/chapter/$id',
  getParentRoute: () => FrontRouteRoute,
} as any)

// Populate the FileRoutesByPath interface

declare module '@tanstack/react-router' {
  interface FileRoutesByPath {
    '/': {
      id: '/'
      path: '/'
      fullPath: '/'
      preLoaderRoute: typeof IndexImport
      parentRoute: typeof rootRoute
    }
    '/_front': {
      id: '/_front'
      path: ''
      fullPath: ''
      preLoaderRoute: typeof FrontRouteImport
      parentRoute: typeof rootRoute
    }
    '/auth': {
      id: '/auth'
      path: '/auth'
      fullPath: '/auth'
      preLoaderRoute: typeof AuthRouteImport
      parentRoute: typeof rootRoute
    }
    '/auth/login': {
      id: '/auth/login'
      path: '/login'
      fullPath: '/auth/login'
      preLoaderRoute: typeof AuthLoginImport
      parentRoute: typeof AuthRouteImport
    }
    '/_front/chapter/$id': {
      id: '/_front/chapter/$id'
      path: '/chapter/$id'
      fullPath: '/chapter/$id'
      preLoaderRoute: typeof FrontChapterIdImport
      parentRoute: typeof FrontRouteImport
    }
    '/_front/lesson/$id': {
      id: '/_front/lesson/$id'
      path: '/lesson/$id'
      fullPath: '/lesson/$id'
      preLoaderRoute: typeof FrontLessonIdImport
      parentRoute: typeof FrontRouteImport
    }
    '/_front/lesson/project': {
      id: '/_front/lesson/project'
      path: '/lesson/project'
      fullPath: '/lesson/project'
      preLoaderRoute: typeof FrontLessonProjectImport
      parentRoute: typeof FrontRouteImport
    }
    '/_front/lesson/system': {
      id: '/_front/lesson/system'
      path: '/lesson/system'
      fullPath: '/lesson/system'
      preLoaderRoute: typeof FrontLessonSystemImport
      parentRoute: typeof FrontRouteImport
    }
    '/_front/topic/$id': {
      id: '/_front/topic/$id'
      path: '/topic/$id'
      fullPath: '/topic/$id'
      preLoaderRoute: typeof FrontTopicIdImport
      parentRoute: typeof FrontRouteImport
    }
    '/_front/topic/create': {
      id: '/_front/topic/create'
      path: '/topic/create'
      fullPath: '/topic/create'
      preLoaderRoute: typeof FrontTopicCreateImport
      parentRoute: typeof FrontRouteImport
    }
    '/_front/chapter/': {
      id: '/_front/chapter/'
      path: '/chapter'
      fullPath: '/chapter'
      preLoaderRoute: typeof FrontChapterIndexImport
      parentRoute: typeof FrontRouteImport
    }
    '/_front/topic/': {
      id: '/_front/topic/'
      path: '/topic'
      fullPath: '/topic'
      preLoaderRoute: typeof FrontTopicIndexImport
      parentRoute: typeof FrontRouteImport
    }
    '/_front/video/': {
      id: '/_front/video/'
      path: '/video'
      fullPath: '/video'
      preLoaderRoute: typeof FrontVideoIndexImport
      parentRoute: typeof FrontRouteImport
    }
  }
}

// Create and export the route tree

interface FrontRouteRouteChildren {
  FrontChapterIdRoute: typeof FrontChapterIdRoute
  FrontLessonIdRoute: typeof FrontLessonIdRoute
  FrontLessonProjectRoute: typeof FrontLessonProjectRoute
  FrontLessonSystemRoute: typeof FrontLessonSystemRoute
  FrontTopicIdRoute: typeof FrontTopicIdRoute
  FrontTopicCreateRoute: typeof FrontTopicCreateRoute
  FrontChapterIndexRoute: typeof FrontChapterIndexRoute
  FrontTopicIndexRoute: typeof FrontTopicIndexRoute
  FrontVideoIndexRoute: typeof FrontVideoIndexRoute
}

const FrontRouteRouteChildren: FrontRouteRouteChildren = {
  FrontChapterIdRoute: FrontChapterIdRoute,
  FrontLessonIdRoute: FrontLessonIdRoute,
  FrontLessonProjectRoute: FrontLessonProjectRoute,
  FrontLessonSystemRoute: FrontLessonSystemRoute,
  FrontTopicIdRoute: FrontTopicIdRoute,
  FrontTopicCreateRoute: FrontTopicCreateRoute,
  FrontChapterIndexRoute: FrontChapterIndexRoute,
  FrontTopicIndexRoute: FrontTopicIndexRoute,
  FrontVideoIndexRoute: FrontVideoIndexRoute,
}

const FrontRouteRouteWithChildren = FrontRouteRoute._addFileChildren(
  FrontRouteRouteChildren,
)

interface AuthRouteRouteChildren {
  AuthLoginRoute: typeof AuthLoginRoute
}

const AuthRouteRouteChildren: AuthRouteRouteChildren = {
  AuthLoginRoute: AuthLoginRoute,
}

const AuthRouteRouteWithChildren = AuthRouteRoute._addFileChildren(
  AuthRouteRouteChildren,
)

export interface FileRoutesByFullPath {
  '/': typeof IndexRoute
  '': typeof FrontRouteRouteWithChildren
  '/auth': typeof AuthRouteRouteWithChildren
  '/auth/login': typeof AuthLoginRoute
  '/chapter/$id': typeof FrontChapterIdRoute
  '/lesson/$id': typeof FrontLessonIdRoute
  '/lesson/project': typeof FrontLessonProjectRoute
  '/lesson/system': typeof FrontLessonSystemRoute
  '/topic/$id': typeof FrontTopicIdRoute
  '/topic/create': typeof FrontTopicCreateRoute
  '/chapter': typeof FrontChapterIndexRoute
  '/topic': typeof FrontTopicIndexRoute
  '/video': typeof FrontVideoIndexRoute
}

export interface FileRoutesByTo {
  '/': typeof IndexRoute
  '': typeof FrontRouteRouteWithChildren
  '/auth': typeof AuthRouteRouteWithChildren
  '/auth/login': typeof AuthLoginRoute
  '/chapter/$id': typeof FrontChapterIdRoute
  '/lesson/$id': typeof FrontLessonIdRoute
  '/lesson/project': typeof FrontLessonProjectRoute
  '/lesson/system': typeof FrontLessonSystemRoute
  '/topic/$id': typeof FrontTopicIdRoute
  '/topic/create': typeof FrontTopicCreateRoute
  '/chapter': typeof FrontChapterIndexRoute
  '/topic': typeof FrontTopicIndexRoute
  '/video': typeof FrontVideoIndexRoute
}

export interface FileRoutesById {
  __root__: typeof rootRoute
  '/': typeof IndexRoute
  '/_front': typeof FrontRouteRouteWithChildren
  '/auth': typeof AuthRouteRouteWithChildren
  '/auth/login': typeof AuthLoginRoute
  '/_front/chapter/$id': typeof FrontChapterIdRoute
  '/_front/lesson/$id': typeof FrontLessonIdRoute
  '/_front/lesson/project': typeof FrontLessonProjectRoute
  '/_front/lesson/system': typeof FrontLessonSystemRoute
  '/_front/topic/$id': typeof FrontTopicIdRoute
  '/_front/topic/create': typeof FrontTopicCreateRoute
  '/_front/chapter/': typeof FrontChapterIndexRoute
  '/_front/topic/': typeof FrontTopicIndexRoute
  '/_front/video/': typeof FrontVideoIndexRoute
}

export interface FileRouteTypes {
  fileRoutesByFullPath: FileRoutesByFullPath
  fullPaths:
    | '/'
    | ''
    | '/auth'
    | '/auth/login'
    | '/chapter/$id'
    | '/lesson/$id'
    | '/lesson/project'
    | '/lesson/system'
    | '/topic/$id'
    | '/topic/create'
    | '/chapter'
    | '/topic'
    | '/video'
  fileRoutesByTo: FileRoutesByTo
  to:
    | '/'
    | ''
    | '/auth'
    | '/auth/login'
    | '/chapter/$id'
    | '/lesson/$id'
    | '/lesson/project'
    | '/lesson/system'
    | '/topic/$id'
    | '/topic/create'
    | '/chapter'
    | '/topic'
    | '/video'
  id:
    | '__root__'
    | '/'
    | '/_front'
    | '/auth'
    | '/auth/login'
    | '/_front/chapter/$id'
    | '/_front/lesson/$id'
    | '/_front/lesson/project'
    | '/_front/lesson/system'
    | '/_front/topic/$id'
    | '/_front/topic/create'
    | '/_front/chapter/'
    | '/_front/topic/'
    | '/_front/video/'
  fileRoutesById: FileRoutesById
}

export interface RootRouteChildren {
  IndexRoute: typeof IndexRoute
  FrontRouteRoute: typeof FrontRouteRouteWithChildren
  AuthRouteRoute: typeof AuthRouteRouteWithChildren
}

const rootRouteChildren: RootRouteChildren = {
  IndexRoute: IndexRoute,
  FrontRouteRoute: FrontRouteRouteWithChildren,
  AuthRouteRoute: AuthRouteRouteWithChildren,
}

export const routeTree = rootRoute
  ._addFileChildren(rootRouteChildren)
  ._addFileTypes<FileRouteTypes>()

/* ROUTE_MANIFEST_START
{
  "routes": {
    "__root__": {
      "filePath": "__root.tsx",
      "children": [
        "/",
        "/_front",
        "/auth"
      ]
    },
    "/": {
      "filePath": "index.tsx"
    },
    "/_front": {
      "filePath": "_front/route.tsx",
      "children": [
        "/_front/chapter/$id",
        "/_front/lesson/$id",
        "/_front/lesson/project",
        "/_front/lesson/system",
        "/_front/topic/$id",
        "/_front/topic/create",
        "/_front/chapter/",
        "/_front/topic/",
        "/_front/video/"
      ]
    },
    "/auth": {
      "filePath": "auth/route.tsx",
      "children": [
        "/auth/login"
      ]
    },
    "/auth/login": {
      "filePath": "auth/login.tsx",
      "parent": "/auth"
    },
    "/_front/chapter/$id": {
      "filePath": "_front/chapter/$id.tsx",
      "parent": "/_front"
    },
    "/_front/lesson/$id": {
      "filePath": "_front/lesson/$id.tsx",
      "parent": "/_front"
    },
    "/_front/lesson/project": {
      "filePath": "_front/lesson/project.tsx",
      "parent": "/_front"
    },
    "/_front/lesson/system": {
      "filePath": "_front/lesson/system.tsx",
      "parent": "/_front"
    },
    "/_front/topic/$id": {
      "filePath": "_front/topic/$id.tsx",
      "parent": "/_front"
    },
    "/_front/topic/create": {
      "filePath": "_front/topic/create.tsx",
      "parent": "/_front"
    },
    "/_front/chapter/": {
      "filePath": "_front/chapter/index.tsx",
      "parent": "/_front"
    },
    "/_front/topic/": {
      "filePath": "_front/topic/index.tsx",
      "parent": "/_front"
    },
    "/_front/video/": {
      "filePath": "_front/video/index.tsx",
      "parent": "/_front"
    }
  }
}
ROUTE_MANIFEST_END */
