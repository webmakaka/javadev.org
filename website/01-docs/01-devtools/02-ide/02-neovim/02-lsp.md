---
layout: page
title: NeoVim for Java Development (LSP)
description: NeoVim for Java Development (LSP)
keywords: java, devtools, neovim, lsp, spring
permalink: /devtools/ide/neovim/lsp/
---

# NeoVim for Java Development (LSP)

<br/>

https://github.com/neovim/nvim-lspconfig

https://github.com/mfussenegger/nvim-jdtls

https://github.com/williamboman/nvim-lsp-installer

<br/>

```
$ mkdir -p ~/.config/nvim/plugged
$ vi ~/.config/nvim/init.vim
```

<br/>

```vim
call plug#begin('~/.config/nvim/plugged')

" LSP client and AutoInstaller
Plug 'neovim/nvim-lspconfig'
Plug 'williamboman/nvim-lsp-installer'
Plug 'mfussenegger/nvim-jdtls'

" Treesitter
Plug 'nvim-treesitter/nvim-treesitter'

call plug#end()
```

<br/>

```
:PlugInstall
```

<br/>

```
:LspInstall java
:LspInstallInfo
```

<br/>

```
path         ~/.local/share/nvim/lsp_servers/jdtls
```

<br/>

```
:TSInstall java
:TSInstallInfo
```

<br/>

```
// lsp_servers logs
$ less ~/.cache/nvim/lsp.log
```

<br/>

### nvim-jdtls

```
$ cd ~/.local/share/nvim/lsp_servers/jdtls/plugins
$ ls org.eclipse.equinox.launcher_*
org.eclipse.equinox.launcher_1.6.400.v20210924-0641.jar
```

<br/>

**Need to specify:**

<br/>

```
'-jar', '/home/marley/.local/share/nvim/lsp_servers/jdtls/plugins/org.eclipse.equinox.launcher_1.6.400.v20210924-0641.jar',
'-configuration', '/home/marley/.local/share/nvim/lsp_servers/jdtls/config_linux',
'-data', '/home/marley/projects/dev/java'
```

<br/>

```
$ mkdir -p ~/.config/nvim/ftplugin/
$ vi ~/.config/nvim/ftplugin/java.lua
```

<br/>

```
-- See `:help vim.lsp.start_client` for an overview of the supported `config` options.
local config = {
  -- The command that starts the language server
  -- See: https://github.com/eclipse/eclipse.jdt.ls#running-from-the-command-line
  cmd = {

    -- 💀
    'java',
    '-Declipse.application=org.eclipse.jdt.ls.core.id1',
    '-Dosgi.bundles.defaultStartLevel=4',
    '-Declipse.product=org.eclipse.jdt.ls.core.product',
    '-Dlog.protocol=true',
    '-Dlog.level=ALL',
    '-Xms1g',
    '--add-modules=ALL-SYSTEM',
    '--add-opens', 'java.base/java.util=ALL-UNNAMED',
    '--add-opens', 'java.base/java.lang=ALL-UNNAMED',

    -- 💀
    '-jar', '/home/marley/.local/share/nvim/lsp_servers/jdtls/plugins/org.eclipse.equinox.launcher_org.eclipse.equinox.launcher_1.6.400.v20210924-0641.jar',
    '-configuration', '/home/marley/.local/share/nvim/lsp_servers/jdtls/config_linux',
    '-data', '/home/marley/projects/dev/java'
  },

  -- 💀
  -- This is the default if not provided, you can remove it. Or adjust as needed.
  -- One dedicated LSP server & client will be started per unique root_dir
  root_dir = require('jdtls.setup').find_root({'.git', 'mvnw', 'gradlew'}),

  -- Here you can configure eclipse.jdt.ls specific settings
  -- See https://github.com/eclipse/eclipse.jdt.ls/wiki/Running-the-JAVA-LS-server-from-the-command-line#initialize-request
  -- for a list of options
  settings = {
    java = {
    }
  }
}
-- This starts a new client & server,
-- or attaches to an existing client & server depending on the `root_dir`.
require('jdtls').start_or_attach(config)

```

<!--
<br/>

### Current Config

```
$ vi ~/.config/nvim/init.vim
```

<br/>

```vim
set colorcolumn=80


" """"""""""""""""""""""""""""""""""""""""

call plug#begin('~/.config/nvim/plugged')

" LSP client and AutoInstaller
Plug 'neovim/nvim-lspconfig'
Plug 'williamboman/nvim-lsp-installer'
Plug 'mfussenegger/nvim-jdtls'

" Treesitter
Plug 'nvim-treesitter/nvim-treesitter'

call plug#end()


" """"""""""""""""""""""""""""""""""""""""""""

" exit on jk from i
inoremap jk <esc>

" turn off search highlight
nnoremap ,<space> :nohlsearch<CR>

map gn :bn<cr>
map gp :bp<cr>
map gw :Bclose<cr>

``` -->

<br/>

### [Spring Boot Development Using Command Line Only](/devtools/ide/neovim/example/)
