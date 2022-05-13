---
layout: page
title: NeoVim for Java Development (COC)
description: NeoVim for Java Development (COC)
keywords: java, devtools, neovim, coc, spring
permalink: /devtools/ide/neovim/coc/
---

# NeoVim for Java Development (COC)

<br/>

```
$ mkdir ~/.config/nvim/plug-config
$ vi ~/.config/nvim/plug-config/coc.vim
```

<br/>

**copy Example vim configuration**  
https://github.com/neoclide/coc.nvim

<br/>

```
$ mkdir -p ~/.config/nvim/plugged
$ vi ~/.config/nvim/init.vim
```

<br/>

```vim

source $HOME/.config/nvim/plug-config/coc.vim

call plug#begin('~/.config/nvim/plugged')

" Stable version of coc
Plug 'neoclide/coc.nvim', {'branch': 'release'}

" Keeping up to date with master
Plug 'neoclide/coc.nvim', {'do': 'yarn install --frozen-lockfile'}

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
:TSInstall java
:TSInstallInfo
```

<br/>

**coc-java**

<br/>

```
:CocInstall coc-java
```

<br/>

**Lombok**

<br/>

```
$ sudo mkdir /usr/local/share/lombok

$ sudo wget https://projectlombok.org/downloads/lombok.jar -O /usr/local/share/lombok/lombok.jar
```

<br/>

### coc-settings.json:

**configuration-options**  
https://github.com/neoclide/coc-tsserver#configuration-options

<br/>

```
$ vi ~/.config/nvim/coc-settings.json
```

<br/>

```json
"codeLens.enable": true,
"java.referencesCodeLens.enabled": true
```

<!--

```
"java.jdt.ls.vmargs": "-javaagent:/usr/local/share/lombok/lombok.jar"
```

-->

<br/>

```
$ vi ~/.config/nvim/init.vim
```

<br/>

```vim
source $HOME/.config/nvim/plug-config/coc.vim

set encoding=utf-8
set noswapfile
set number
set scrolloff=8
set colorcolumn=79
set list
set listchars=tab:→\ ,space:·,nbsp:␣,trail:•,eol:¶,precedes:«,extends:»
set wildignore+=*/tmp/*,*/dist/*,*/node_modules/*,*.so,*.swp,*.zip,package-lock.json

" show existing tab with 2 spaces width
set tabstop=2
" when indenting with '>', use 2 spaces width
set shiftwidth=2
" On pressing tab, insert 2 spaces
set expandtab

" -----------------------------------------------

call plug#begin('~/.config/nvim/plugged')

" Stable version of coc
Plug 'neoclide/coc.nvim', {'branch': 'release'}

" Keeping up to date with master
Plug 'neoclide/coc.nvim', {'do': 'yarn install --frozen-lockfile'}

" Treesitter
Plug 'nvim-treesitter/nvim-treesitter'


Plug 'scrooloose/nerdtree'
Plug 'Xuyuanp/nerdtree-git-plugin'
Plug 'tiagofumo/vim-nerdtree-syntax-highlight'

Plug 'ctrlpvim/ctrlp.vim'
Plug 'ryanoasis/vim-devicons'

" Automatic close parens
Plug 'jiangmiao/auto-pairs'

" Colorscheme
Plug 'morhetz/gruvbox'
Plug 'crusoexia/vim-monokai'

" Emmet
Plug 'mattn/emmet-vim'

" highlight colors
Plug 'rrethy/vim-hexokinase', { 'do': 'make hexokinase' }

" css3 syntax highlight
Plug 'hail2u/vim-css3-syntax'

" Syntax hightlight for .js
Plug 'pangloss/vim-javascript'

" Syntax highlight for .ts
Plug 'HerringtonDarkholme/yats.vim', { 'for': 'typescript' }

" Syntax highlight for .tsx
Plug 'ianks/vim-tsx', { 'for': 'typescript.tsx' }

" Syntax hightlight for Vue.js
Plug 'posva/vim-vue'

"Plug 'iamcco/coc-angular', {'branch': 'release'}
Plug 'airblade/vim-gitgutter'

" Syntax hightlight for .jsx
Plug 'mxw/vim-jsx'

"Commenting
Plug 'preservim/nerdcommenter'

"Airline
Plug 'vim-airline/vim-airline'

"Tailwindcss
Plug 'iamcco/coc-tailwindcss',  {'do': 'yarn install --frozen-lockfile && yarn run build'}

"Grahql
Plug 'jparise/vim-graphql'

call plug#end()

" -----------------------------------------------

syntax on
colorscheme gruvbox

filetype plugin indent on

let g:NERDTreeWinPos = "right"
let g:NERDTreeIgnore = ['^node_modules$']

let g:ctrlp_use_caching = 0
let g:ctrlp_working_path_mode = 0
let g:ctrlp_custom_ignore = '\v[\/]\.(git)$'
let g:ctrlp_custom_ignore = 'node_modules\|dist\'

" coc config
let g:coc_global_extensions = [
  \ 'coc-snippets',
  \ 'coc-pairs',
  \ 'coc-tsserver',
  \ 'coc-eslint',
  \ 'coc-prettier',
  \ 'coc-json',
  \ 'coc-html',
  \ 'coc-css',
  \ 'coc-vetur',
  \ ]

"mappings
map <C-n> :NERDTreeToggle<CR>

"block Ctrl + Z
nnoremap <c-z> <nop>

"block arrows
noremap <Up> <Nop>
noremap <Down> <Nop>
noremap <Left> <Nop>
noremap <Right> <Nop>


"block mouse coursor
set mouse=

"Insert a newline without entering in insert mode, vim
nmap oo o<Esc>k
nmap OO O<Esc>j

"CTRL + S to save
nmap <c-s> :w<CR>
vmap <c-s> <Esc><c-s>gv
imap <c-s> <Esc><c-s>

"CTRL + Z to undo
nnoremap <c-z> :u<CR>      " Avoid using this**
inoremap <c-z> <c-o>:u<CR>

nmap <F2> :update<CR>
vmap <F2> <Esc><F2>gv
imap <F2> <c-o><F2>

noremap <F3> :set invnumber<CR>
inoremap <F3> <C-O>:set invnumber<CR>

nmap <silent> gd <Plug>(coc-definition)

inoremap jk <esc>

" Use `:Prettier` command for coc
command! -nargs=0 Prettier :CocCommand prettier.formatFile

" Use `:Format` to format current buffer
command! -nargs=0 Format :call CocAction('format')
```

<br/>

```
:PlugInstall
```

<br/>

### [Spring Boot Development Using Command Line Only](/devtools/ide/neovim/example/)

<br/>

### Materials with COC:

https://www.youtube.com/watch?v=8q_VPqA-KLs

https://www.chrisatmachine.com/Neovim/24-neovim-and-java/

<br/>

https://www.youtube.com/watch?v=OXEVhnY621M

https://www.chrisatmachine.com/Neovim/04-vim-coc/

<br/>

https://github.com/neoclide/coc.nvim/wiki/Using-coc-extensions
