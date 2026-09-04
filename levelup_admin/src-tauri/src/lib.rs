#[cfg_attr(mobile, tauri::mobile_entry_point)]

use tauri::{AppHandle, Manager};

#[tauri::command]
fn set_window_mode(app: AppHandle, role: i32) {
    let window = app.get_webview_window("main").unwrap();

    if role == 1 {
        // Admin
        let _ = window.set_decorations(true);
        let _ = window.set_fullscreen(false);
        let _ = window.set_resizable(true);
        let _ = window.set_maximizable(true);
        let _ = window.set_minimizable(true);
        let _ = window.maximize();
    } else {
        // User
        let _ = window.set_decorations(false);
        let _ = window.set_fullscreen(true);
        let _ = window.set_resizable(false);
        let _ = window.set_maximizable(false);
        let _ = window.set_minimizable(false);
    }
}

pub fn run() {
  tauri::Builder::default()
    .setup(|app| {
      if cfg!(debug_assertions) {
        app.handle().plugin(
          tauri_plugin_log::Builder::default()
            .level(log::LevelFilter::Info)
            .build(),
        )?;
      }
      Ok(())
    })

    .invoke_handler(tauri::generate_handler![
      set_window_mode
    ])

    .run(tauri::generate_context!())
    .expect("error while running tauri application");
}
