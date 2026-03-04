# CLAUDE.md — user-master-app AI Rules

## Stack
- PHP 8.x / Laravel 8.x / PHPUnit
- Vue.js 2 + Laravel Mix / Bootstrap 5
- SQLite (dev) / MySQL (prod)
- エンジニア2名チーム

## 必須コマンド
```bash
php artisan test          # テスト実行
php artisan migrate       # マイグレーション
```

## アーキテクチャ規約
Route → Controller → Model

- Controller: 1メソッド15行以内。ビジネスロジックを含めない
- Model: Eloquentのみ使用。Repositoryパターンは使わない
- Blade: レイアウト継承（layouts/app.blade.php）を使う

## 命名規則
- クラス: PascalCase / メソッド: camelCase / テーブル: snake_case複数形
- ルート名: リソース名.アクション（例: users.index）

## 絶対禁止
- `DB::statement()` でDDL実行（Migrationを使う）
- `env()` をコードで直接呼ぶ（`config()` 経由のみ）
- マイグレーションの `down()` を省略する
- `.env` ファイルの直接編集（サンプルは `.env.example` に書く）

## テスト規約
- Feature テスト: HTTPリクエスト経由でテスト
- `RefreshDatabase` を使用
- 全Modelに Factory を用意する

## 自動化の境界
- Claude（自動OK）: テスト修正、バリデーションルール修正、Bladeテンプレート修正
- 人間（必須）: ビジネスロジック変更、マイグレーション実行、本番デプロイ承認

## 触ってはいけないファイル
- `.env*`
- `database/migrations/`（スキーマ変更は人間が判断）
- `.github/workflows/`
